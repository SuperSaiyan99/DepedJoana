<?php

namespace App\Livewire\ManagementOffice;

use App\Models\Manage\JobPosting;
use Livewire\Attributes\On;
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
    'number_of_vacancy' => 'required|string|max:255',
    'is_vacancy_shs' => 'boolean',
    'subject' => 'required|array',
    'subject.*' => 'string|max:255',
    'track' => 'required_if:is_vacancy_shs,1|string|max:255',
    'strand' => 'required_if:is_vacancy_shs,1|string|max:255',
    'place_of_assignment' => 'required|array',
    'place_of_assignment.*' => 'string|max:255',
    'job_summary' => 'required|string|max:255',
])]
class JobPostingCards extends Component
{
    public $jobPostings;
    public JobPosting $selectedJob;
    public $isEditing = false;

    public $education, $training, $experience, $eligibility;
    public $position_title, $plantilla_number, $salary_grade, $monthly_salary, $number_of_vacancy;
    public $is_vacancy_shs, $subject, $track, $strand, $place_of_assignment, $job_summary;


    protected $listeners = ['jobPostingUpdated' => 'refreshJobPostings'];

    #[On('post-created')]
    public function mount(JobPosting $jobPosting)
    {

        $this->jobPostings = JobPosting::all();

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
    }

    public function showModal($jobId)
    {
        $this->selectedJob = JobPosting::findOrFail($jobId);

        $this->education = $this->selectedJob->education;
        $this->training = $this->selectedJob->training;
        $this->experience = $this->selectedJob->experience;
        $this->eligibility = $this->selectedJob->eligibility;

        // Populate additional fields
        $this->position_title = $this->selectedJob->position_title;
        $this->plantilla_number = json_decode($this->selectedJob->plantilla_number, true) ?? [];
        $this->salary_grade = $this->selectedJob->salary_grade;
        $this->monthly_salary = $this->selectedJob->monthly_salary;
        $this->number_of_vacancy = $this->selectedJob->number_of_vacancy;
        $this->is_vacancy_shs = $this->selectedJob->is_vacancy_shs;
        $this->subject = json_decode($this->selectedJob->subject, true) ?? [];
        $this->track = $this->selectedJob->track;
        $this->strand = $this->selectedJob->strand;
        $this->place_of_assignment = json_decode($this->selectedJob->place_of_assignment, true) ?? [];
        $this->job_summary = $this->selectedJob->job_summary;

        $this->isEditing = false;
    }

    public function refreshJobPostings($jobId)
    {
        $this->jobPostings = JobPosting::all(); // Re-fetch all job postings

        // If you want to keep the modal open after the update, re-select the updated job
        $this->selectedJob = JobPosting::findOrFail($jobId);
    }

    public function saveModal()
    {
        $this->validate();

        // Update the job posting fields in the database, encoding array properties to JSON
        $this->selectedJob->update([
            'education' => $this->education,
            'training' => $this->training,
            'experience' => $this->experience,
            'eligibility' => $this->eligibility,
            'position_title' => $this->position_title,
            'plantilla_number' => json_encode($this->plantilla_number),
            'salary_grade' => $this->salary_grade,
            'monthly_salary' => $this->monthly_salary,
            'number_of_vacancy' => $this->number_of_vacancy,
            'is_vacancy_shs' => $this->is_vacancy_shs,
            'subject' => json_encode($this->subject),
            'track' => $this->track,
            'strand' => $this->strand,
            'place_of_assignment' => json_encode($this->place_of_assignment),
            'job_summary' => $this->job_summary,
        ]);

        $this->dispatch('post-created', $this->selectedJob->id);

        session()->flash('message', 'Job Posting Updated Successfully.');

        $this->isEditing = false;
    }

    public function addButton($property)
    {
        $this->$property [] = ''; // Add a new empty education entry
    }

    public function removeButton($index, $property)
    {
        unset($this->$property[$index]);
        $this->$property = array_values($this->$property); // Re-index the array
    }


    public function render()
    {
        return view('livewire.management-office.job-posting-cards');
    }
}
