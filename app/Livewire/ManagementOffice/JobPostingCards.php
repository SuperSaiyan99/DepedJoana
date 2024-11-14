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
    public $position_title, $plantilla_number = [], $salary_grade, $monthly_salary, $number_of_vacancy;
    public $is_vacancy_shs, $subject, $track, $strand, $place_of_assignment, $job_summary;


    public function mount()
    {
        $this->mountJobPostingComponents();
    }

    public function render()
    {
        return view('livewire.management-office.job-posting-cards');
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


    public function saveModal()
    {
        #$this->validate();

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

    public function mountJobPostingComponents()
    {
        $jobPostingModel = new JobPosting();

        $userId = \Auth::user()->id;


        #Query to display job vacancies
        #if hrmo, all vacancies, if hrmpsb then limited job vacancies assigned
        if (\Auth::user()->role === 'hrmpsb') {
            $this->jobPostings = DB::table('vacancies')
                ->join('selection_board', 'vacancies.id', '=', 'selection_board.vacancy_id')
                ->where( 'selection_board.user_id', $userId)
                ->where('vacancies.status', 'Active')
                ->select(
                    'vacancies.id',
                    'vacancies.position_title',
                    'vacancies.education',
                    'vacancies.training',
                    'vacancies.experience',
                    'vacancies.eligibility',
                    'vacancies.plantilla_number',
                    'vacancies.salary_grade',
                    'vacancies.monthly_salary',
                    'vacancies.place_of_assignment'
                )
                ->get();
        }
        else if (\Auth::user()->role === 'hrmo'){
            $this->jobPostings = $jobPostingModel::where('status', 'active')
                ->get();
        }



        $this->selectedJob = $jobPostingModel;

        // Populate form fields
        $this->education = $jobPostingModel->education;
        $this->training = $jobPostingModel->training;
        $this->experience = $jobPostingModel->experience;
        $this->eligibility = $jobPostingModel->eligibility;

        // Populate additional fields
        $this->position_title = $jobPostingModel->position_title;
        $this->plantilla_number = json_decode($jobPostingModel->plantilla_number, true) ?? [];
        $this->salary_grade = $jobPostingModel->salary_grade;
        $this->monthly_salary = $jobPostingModel->monthly_salary;
        $this->number_of_vacancy = $jobPostingModel->number_of_vacancy;
        $this->is_vacancy_shs = $jobPostingModel->is_vacancy_shs;
        $this->subject = json_decode($jobPostingModel->subject, true) ?? [];
        $this->track = $jobPostingModel->track;
        $this->strand = $jobPostingModel->strand;
        $this->place_of_assignment = json_decode($jobPostingModel->place_of_assignment, true) ?? [];
        $this->job_summary = $jobPostingModel->job_summary;
    }


    public function showDetails($vacancy_code)
    {
        // Fetch the first applicant in FIFO order based on `created_at` or another relevant timestamp
        $applicant = DB::table('applicants')
            ->join('applicant_status', 'applicants.id', '=', 'applicant_status.applicant_id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->join('applicant_residential_address', 'applicants.id', '=', 'applicant_residential_address.applicant_id')
            ->join('applicant_permanent_address', 'applicants.id', '=', 'applicant_permanent_address.applicant_id')
            ->join('applicant_contact_information', 'applicants.id', '=', 'applicant_contact_information.applicant_id')
            ->join('vacancies', 'applicant_status.vacancy_id', '=', 'vacancies.id')
            ->where([
                ['applicant_status.status', 'reviewed'],
                ['applicant_status.vacancy_id', $vacancy_code],
            ])
            ->select('applicants.applicant_code', 'applicants.id')
            ->orderBy('applicant_status.created_at', 'asc')
            ->first();

        // Check if an applicant was found
        if ($applicant) {

            $applicant_code = $applicant->applicant_code;

            return redirect()->route('selection-board.applicant-information', [
                'vacancy_code' => $vacancy_code,
                'applicant_code' => $applicant_code
            ]);

        } else {

            session()->flash('message', 'No applicant found for this job posting.');
        }
    }



}
