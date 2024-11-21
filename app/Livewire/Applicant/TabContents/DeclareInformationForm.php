<?php

namespace App\Livewire\Applicant\TabContents;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeclareInformationForm extends Component
{
    use WithFileUploads;

    public $govIssuedID , $idNumber , $dateAccomplished;
    public $datePlaceIssued, $photoUpload , $thumbmarkUpload;
    public $signatureUpload;

    public $applicantChosenVacancy, $applicantId;

    public $declareOath = false;

    protected $rules = [
        'govIssuedID' => 'required|string|max:255',
        'idNumber' => 'required|string|max:255',
        'dateAccomplished' => 'required|date',
        'datePlaceIssued' => 'required|string|max:255',
        'photoUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'thumbmarkUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signatureUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'declareOath' => 'accepted',
    ];

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->applicantChosenVacancy = session('applicantChosenVacancy');

        $this->getDeclarationInformation();
    }

    public function getDeclarationInformation()
    {
        // Check if existing data is available
        $existingData = DB::table('applicant_pds_declaration')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->first();

        if ($existingData) {
            $this->govIssuedID = $existingData->gov_issued_id;
            $this->idNumber = $existingData->id_number;
            $this->dateAccomplished = $existingData->date_accomplished;
            $this->datePlaceIssued = $existingData->date_place_issued;
        }
    }

    public function fetchApplicantInformation()
    {
        return DB::table('applicants')
            ->where('id', $this->applicantId)
            ->first();
    }

    public function submit()
    {
       $this->validate();
        $applicantData = $this->fetchApplicantInformation();

        try {
            \DB::beginTransaction();

            // Handle file uploads
            $photoPath = $this->photoUpload->store('photos/' . $applicantData->applicant_code, 'public');
            $thumbmarkPath = $this->thumbmarkUpload->store('thumbmarks/' . $applicantData->applicant_code, 'public');
            $signaturePath = $this->signatureUpload->store('signatures/' . $applicantData->applicant_code, 'public');

            // Update or insert the applicant's declaration data
            \App\Services\Queries\QueryService::updateOrCreate('applicant_pds_declaration',
                [
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy,
                ],
                [
                    'gov_issued_id' => $this->govIssuedID,
                    'id_number' => $this->idNumber,
                    'date_accomplished' => $this->dateAccomplished,
                    'date_place_issued' => $this->datePlaceIssued,
                    'photo_path' => $photoPath,
                    'thumbmark_path' => $thumbmarkPath,
                    'signature_path' => $signaturePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            $this->updateApplicantStatus();

            \DB::commit();

            flash()->success('Declaration Information submitted successfully!');
            
        } catch (\Exception $e) {
            \DB::rollBack();

            flash()->error('An error occurred while saving Declaration Information.');
            \Log::error($e->getMessage());
        }


    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.declare-information-form');
    }


    public function updateApplicantStatus()
    {
        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);


        DB::table('applicant_status')
            ->updateOrInsert(
                [
                    'applicant_id' => $applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy # session from AddPost Livewire component passed here
                ],
                [
                    'status' => 'reviewed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
    }


}
