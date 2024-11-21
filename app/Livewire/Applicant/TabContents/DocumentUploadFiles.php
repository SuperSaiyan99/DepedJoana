<?php

namespace App\Livewire\Applicant\TabContents;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;

class DocumentUploadFiles extends Component
{
    use WithFileUploads;

    public $photo,  $existingFileName;

    public $uploadProgress = 0;
    public $vacancyId, $applicantId;
    private $GsExecutableLocation = "C:\Program Files\gs\gs9.24\bin\gswin64c.exe";


    public function render()
    {
        return view('livewire.applicant.tab-contents.document-upload-files');
    }

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->vacancyId = session('applicantChosenVacancy');

        $this->checkIfApplicantDocumentExists();

        if (!$this->applicantId || !$this->vacancyId) {
            flash()->warning('Session Timeout, Returning to Home Page');
            return redirect()->route('applicants.home');
        }
    }

    public function checkIfApplicantDocumentExists()
    {
        $document = \DB::table('applicant_uploaded_documents')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->vacancyId)
            ->first(['file_name']);

        if ($document) {
            $this->existingFileName = $document->file_name;
        }
    }

    public function save()
    {
        $this->validate([
            'photo' => 'required|file|mimes:pdf|max:102400',
        ]);

        #retrieve data
        $applicantData = $this->retrieveApplicantAndVacancyCode();

        $SortedpathName = 'applicants-pdf-documents/' . $applicantData->applicant_code . '/' . $applicantData->vacancy_code;

        # store pdf
        $path = $this->photo->store($SortedpathName, 'public');

        #  Save to database
        \App\Services\Queries\QueryService::updateOrCreate('applicant_uploaded_documents', [
            'applicant_id' => $this->applicantId,
            'vacancy_id' => $this->vacancyId,
        ], [
            'file_path' => $path,
            'file_name' => $this->photo->getClientOriginalName(),
            'file_type' => $this->photo->getMimeType(),
            'file_size' => $this->photo->getSize(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        # Reset progress and file input
        $this->reset('photo', 'uploadProgress');

        flash()->success('Document uploaded successfully.');

    }

    public function retrieveApplicantAndVacancyCode()
    {

        return DB::table('applicant_status')
                ->join('applicants', 'applicants.id', '=', 'applicant_status.applicant_id')
                ->join('vacancies', 'vacancies.id', '=', 'applicant_status.vacancy_id')
                ->where('applicants.id', $this->applicantId)
                ->where('vacancies.id', $this->vacancyId)
                ->select([
                    'applicants.applicant_code',
                    'vacancies.vacancy_code',
                ])
            ->first();
    }

    public function convertPdfToImages()
    {
        Ghostscript::setGsPath($this->GsExecutableLocation);
        $pdf = new Pdf($this->pdfFile);

        $totalPages = $pdf->getNumberOfPages();
        for ($page = 1; $page <= $totalPages; $page++) {

            $pdf->setPage($page);

            #TODO: Change image name into format NAME-TIME-PAGE-FORMAT
            $imageName = uuid_create() . '-page-' . $page . '.jpg';
            $imagePath = 'app/public/pdf-images/' . $imageName;
            $pdf->saveImage(storage_path($imagePath));

            // Store the URLs for the carousel display
            $this->images[] = route('management-officer.image', ['filename' => $imageName]);
        }
    }

    public function updatedPhoto()
    {
        $this->uploadProgress = 0;
    }

}
