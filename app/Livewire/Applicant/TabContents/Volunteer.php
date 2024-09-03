<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class Volunteer extends Component
{

    public $volunteerWorks = [];

    public function mount()
    {
        // Initialize with one empty volunteer work entry
        $this->volunteerWorks[] = $this->emptyVolunteerWork();
    }

    public function emptyVolunteerWork()
    {
        return [
            'organization' => '',
            'from_date' => '',
            'to_date' => '',
            'hours' => '',
            'position' => '',
        ];
    }

    public function addVolunteerWork()
    {
        $this->volunteerWorks[] = $this->emptyVolunteerWork();
    }

    public function removeVolunteerWork($index)
    {
        unset($this->volunteerWorks[$index]);
        $this->volunteerWorks = array_values($this->volunteerWorks);
    }
    public function render()
    {
        return view('livewire.applicant.tab-contents.volunteer');
    }
}
