<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class WorkExperience extends Component
{
    public $experiences = [];

    public function mount()
    {
        // Initialize with one empty experience
        $this->experiences[] = $this->emptyExperience();
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

    public function save()
    {
        // Save logic here

        dd($this->experiences);
    }


    public function render()
    {
        return view('livewire.applicant.tab-contents.work-experience');
    }
}
