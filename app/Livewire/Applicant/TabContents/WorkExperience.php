<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class WorkExperience extends Component
{
    public $experiences = [];
    public $characterCounts = [];
    public $salaryGrades = [];
    public $applicantId, $applicantChosenVacancy;

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->applicantChosenVacancy = session('applicantChosenVacancy');
        $this->salaryGrades = \DB::table('salary_grade')->get();
        $this->getApplicantWorkExperiences();
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.work-experience');
    }

    public function getApplicantWorkExperiences()
    {
        $applicantWorkExperiences =  \DB::table('applicant_work_experiences')
                ->where('applicant_id', $this->applicantId)
                ->where('vacancy_id', $this->applicantChosenVacancy)
                ->get();

        if ($applicantWorkExperiences->isNotEmpty()) {
            $this->experiences = $applicantWorkExperiences->map(function ($experience) {
                return [
                    'job_titles' => $experience->job_titles,
                    'company' => $experience->company,
                    'government_service' => $experience->government_service,
                    'salary_grade' => $experience->salary_grade,
                    'salary_step' => $experience->salary_step,
                    'start_date' => $experience->start_date,
                    'end_date' => $experience->end_date,
                    'current_role' => (bool) $experience->current_role,
                    'description' => $experience->description,
                ];
            })->toArray();
        } else {
            $this->experiences[] = $this->emptyExperience();
        }
    }

    public function emptyExperience()
    {
        return [
            'job_titles' => '',
            'company' => '',
            'government_service' => '',
            'salary_grade' => '',
            'salary_step' => '',
            'start_date' => '',
            'end_date' => '',
            'current_role' => false,
            'description' => '',
        ];
    }

    public function addExperience()
    {
        $this->experiences[] = $this->emptyExperience();
    }

    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    protected $listeners = ['updateTextareaCount' => 'updateCharacterCount'];
    public function updateCharacterCount($count, $index)
    {
        $this->characterCounts[$index] = $count;
    }

    public function save()
    {
        try {
            \DB::beginTransaction();

            if (! $this->applicantId) {
                throw new \Exception('Applicant not found.');
            } if (! $this->applicantChosenVacancy) {
                throw new \Exception('applicantChosenVacancy not found.');
            }


            \DB::table('applicant_work_experiences')
                ->where('applicant_id', $this->applicantId)
                ->delete();

            // Save each experience
            foreach ($this->experiences as $experience) {
                \DB::table('applicant_work_experiences')->insert([
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy,
                    'job_titles' => $experience['job_titles'],
                    'company' => $experience['company'],
                    'government_service' => $experience['government_service'],
                    'salary_grade' => $experience['salary_grade'],
                    'salary_step' => $experience['salary_step'],
                    'start_date' => $experience['start_date'],
                    'end_date' => $experience['end_date'],
                    'current_role' => $experience['current_role'],
                    'description' => $experience['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            \DB::commit();

            session()->flash('message', 'Work experiences saved successfully.');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving work experiences.');
            \Log::error($e->getMessage());
        }
    }




}
