<?php

namespace App\Livewire\ManagementOffice;

use App\Livewire\SelectionBoard\CandidatesInitialQualifiedTab;
use App\Models\HRMO\JobPosting;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Validate([
    'education' => 'required|string|max:255',
    'training' => 'required|string|max:255',
    'experience' => 'required|string|max:255',
    'eligibility' => 'required|string|max:255',
    'position_title' => 'required|string|max:255',
    'plantilla_number' => 'required|array',
    'plantilla_number.*' => 'string|max:255',
    'salary_grade' => 'required|string|max:255',
    'monthly_salary' => 'required|string|max:255',
    'number_of_vacancy' => 'required|integer|max:255',
    'is_vacancy_shs' => 'boolean',
    'subject' => 'required|array',
    'subject.*' => 'string|max:255',
    'track' => 'required_if:is_vacancy_shs,1|string|max:255',
    'strand' => 'required_if:is_vacancy_shs,1|string|max:255',
    'place_of_assignment' => 'required|array',
    'place_of_assignment.*' => 'string|max:255',
    'job_summary' => 'required|string|max:255',
])]

class InitialInterviewCards extends Component
{
    public $jobPostings;
    public JobPosting $selectedJob;
    public $isEditing = false;

    public  $education,
            $training,
            $experience,
            $eligibility;

    public  $position_title,
            $plantilla_number = [],
            $salary_grade,
            $monthly_salary,
            $number_of_vacancy;

    public  $is_vacancy_shs,
            $subject,
            $track,
            $strand,
            $place_of_assignment,
            $job_summary,
            $school_level;

    public $selection_boards = [];

    public function mount(JobPosting $jobPosting)
    {
        $this->populateFormFields($jobPosting);

    }

    public function render()
    {
        return view('livewire.management-office.initial-interview-cards');
    }

    public function showModal($jobId)
    {
        $this->selectedJob = JobPosting::findOrFail($jobId);

        $this->dispatch('fetch-vacancy-id', ['vacancyId' => $this->selectedJob->id])->to(CandidatesInitialQualifiedTab::class);
    }

    public function printPdf()
    {

        $data = $this->getApplicantData($this->selectedJob->id);
        $dataCollection = collect($data);

        $vacancyInformation = [
            'position_title' => $dataCollection->first()->position_title,
            'school_level' => $dataCollection->first()->school_level,
            'education' => $dataCollection->first()->education,
            'training' => $dataCollection->first()->training,
            'experience' => $dataCollection->first()->experience,
            'eligibility' => $dataCollection->first()->eligibility,
            'salary_grade' => $dataCollection->first()->salary_grade,
            'monthly_salary' => $dataCollection->first()->monthly_salary
        ];

        // Generate the PDF view
        $pdfView = view('HRMO.layouts.print-initial-evaluation-results', ['data' => $data, 'vacancyInfo' => $vacancyInformation])->render();

        // Generate the PDF using Browsershot
        $pdf = \Spatie\Browsershot\Browsershot::html($pdfView)
            ->format('A4')
            ->landscape()
            ->margins(10, 10, 10, 10)
            ->showBackground()
            ->setTemporaryDirectory(storage_path('app/temp'))
            ->pdf();

        // Return the PDF as a stream download
        return response()->streamDownload(
            fn () => print($pdf),
            'Initial_Evaluation_Result.pdf'
        );
    }


    public function getApplicantData($vacancyId)
    {
        return  DB::table('applicant_status')
            ->join('applicants', 'applicants.id', '=', 'applicant_status.applicant_id')
            ->join('vacancies', 'vacancies.id', '=', 'applicant_status.vacancy_id')
            ->join('applicant_personal_information', 'applicant_personal_information.applicant_id', '=', 'applicants.id')
            ->join('applicant_residential_address', 'applicant_residential_address.applicant_id', '=', 'applicants.id')
            ->join('applicant_permanent_address', 'applicant_permanent_address.applicant_id', '=', 'applicants.id')
            ->join('applicant_increments_score', 'applicant_increments_score.applicant_id', '=', 'applicants.id')
            ->where('applicant_status.vacancy_id',  $vacancyId)
            ->select(
                'applicants.*',
                'vacancies.*',
                'applicant_personal_information.*',
                'applicant_residential_address.*',
                'applicant_permanent_address.*',
                'applicant_increments_score.*'
            )
            ->get()
            ->toArray();
    }



    public function saveModal()
    {
        // Dispatching event with selectedJob->id as a parameter
        $this->dispatch('initial-evaluation-result-saveData', $this->selectedJob->id);

        $this->setVacancyStatusForInterview();

        session()->flash('message', 'Job Posting Updated Successfully.');

        $this->isEditing = false;
    }

    public function setVacancyStatusForInterview()
    {
        return DB::table('vacancies')
            ->where('id', $this->selectedJob->id)
            ->update([
                'status' => 'For_interview'
            ]);
    }

    public function addButton($property)
    {
        $this->$property [] = '';
    }

    public function removeButton($index, $property)
    {
        unset($this->$property[$index]);
        $this->$property = array_values($this->$property);
    }

    public function populateFormFields(JobPosting $jobPosting)
    {
        $this->jobPostings = JobPosting::where('status', 'On_going')->get();
        $this->selectedJob = $jobPosting;

        // Populate form fields
        $this->education = $jobPosting->education;
        $this->training = $jobPosting->training;
        $this->experience = $jobPosting->experience;
        $this->eligibility = $jobPosting->eligibility;

        // Populate additional fields
        $this->position_title = $jobPosting->position_title;
        $this->school_level = $jobPosting->school_level;
        $this->plantilla_number = json_decode($jobPosting->plantilla_number, true) ?? [];
        $this->salary_grade = $jobPosting->salary_grade;
        $this->monthly_salary = $jobPosting->monthly_salary;
        $this->number_of_vacancy = $jobPosting->number_of_vacancy;
        $this->is_vacancy_shs = $jobPosting->is_vacancy_shs;
        $this->subject = json_decode($jobPosting->subject, true) ?? [];
        $this->track = $jobPosting->track;
        $this->strand = $jobPosting->strand;
        $this->place_of_assignment = json_decode($jobPosting->place_of_assignment, true) ?? [];
        $this->job_summary = $jobPosting->job_summary;
    }




}
