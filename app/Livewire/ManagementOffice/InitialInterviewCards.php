<?php

namespace App\Livewire\ManagementOffice;

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

    public $education, $training, $experience, $eligibility;
    public $position_title, $plantilla_number = [], $salary_grade, $monthly_salary, $number_of_vacancy;
    public $is_vacancy_shs, $subject, $track, $strand, $place_of_assignment, $job_summary;

    public $candidates = [],
           $selection_boards;

    public function mount(JobPosting $jobPosting)
    {
        $this->jobPostings = JobPosting::where('status', 'active')->get();

        $this->selectedJob = $jobPosting;

        // Populate form fields
        $this->education = $jobPosting->education;
        $this->training = $jobPosting->training;
        $this->experience = $jobPosting->experience;
        $this->eligibility = $jobPosting->eligibility;

        // Populate additional fields
        $this->position_title = $jobPosting->position_title;
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

        #Modal
        $this->candidates = $this->showCandidate();
        $this->selection_boards = $this->showSelectionBoard();

    }

    public function render()
    {
        return view('livewire.management-office.initial-interview-cards');
    }

    public function showModal($jobId)
    {
        $this->selectedJob = JobPosting::findOrFail($jobId);

    }


    public function saveModal()
    {
        #$this->validate();

        //TODO: Update the job posting fields in the database, encoding array properties to JSON
//        $this->selectedJob->update([
//
//        ]);


        session()->flash('message', 'Job Posting Updated Successfully.');

        $this->isEditing = false;
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

    public function showCandidate()
    {
        return DB::table('applicant_interview_status')
            ->join('applicants', 'applicants.id', '=', 'applicant_interview_status.applicant_id')
            ->join('vacancies', 'vacancies.id', '=', 'applicant_interview_status.vacancy_id')
            ->join('applicant_status', 'applicant_status.applicant_id', '=', 'applicant_interview_status.applicant_id')
            ->where('applicant_status.status', 'initial_qualified')
            ->get(['applicants.*', 'applicant_interview_status.*', 'vacancies.*', 'applicant_status.*'])
            ->toArray();
    }

    public function showSelectionBoard()
    {
        return DB::table('selection_board')
            ->join('users', 'users.id', '=', 'selection_board.user_id')
            ->join('vacancies', 'vacancies.id', '=', 'selection_board.vacancy_id')
            ->join('user_profile', 'user_profile.id', '=', 'selection_board.user_profile_id')
            ->where('users.role', 'hrmpsb')
            ->get(['selection_board.*', 'vacancies.*', 'user_profile.*'])
            ->toArray();
    }

}
