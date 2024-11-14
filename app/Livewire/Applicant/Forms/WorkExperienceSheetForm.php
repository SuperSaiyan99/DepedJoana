<?php

namespace App\Livewire\Applicant\Forms;

use Livewire\Component;

class WorkExperienceSheetForm extends Component
{
    public $workExperiences = []; // Array to hold multiple work experience forms

    protected $rules = [
        'workExperiences.*.start' => 'required|date',
        'workExperiences.*.end' => 'required|date|after_or_equal:workExperiences.*.start',
        'workExperiences.*.position' => 'required|string|max:255',
        'workExperiences.*.officeUnit' => 'required|string|max:255',
        'workExperiences.*.supervisor' => 'required|string|max:255',
        'workExperiences.*.agency' => 'required|string|max:255',
        'workExperiences.*.accomplishments' => 'nullable|string',
        'workExperiences.*.duties' => 'required|string',
    ];

    public function mount()
    {
        // Initialize with one work experience by default
        $this->workExperiences[] = [
            'start' => '',
            'end' => '',
            'position' => '',
            'officeUnit' => '',
            'supervisor' => '',
            'agency' => '',
            'accomplishments' => '',
            'duties' => '',
        ];
    }

    public function addWorkExperience()
    {
        // Add a new empty work experience form
        $this->workExperiences[] = [
            'start' => '',
            'end' => '',
            'position' => '',
            'officeUnit' => '',
            'supervisor' => '',
            'agency' => '',
            'accomplishments' => '',
            'duties' => '',
        ];
    }

    public function removeWorkExperience($index)
    {
        // Remove work experience at the given index
        unset($this->workExperiences[$index]);
        $this->workExperiences = array_values($this->workExperiences); // Re-index the array
    }

    public function save()
    {
        $this->validate();

        #TODO: Save all work experiences to the database
//        foreach ($this->workExperiences as $experience) {
//           Save each $experience to the database
//        }

        dd($this->validate());

        session()->flash('message', 'Work experiences saved successfully.');
    }

    public function render()
    {
        return view('livewire.applicant.forms.work-experience-sheet-form');
    }
}
