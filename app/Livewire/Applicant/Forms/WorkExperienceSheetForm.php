<?php

namespace App\Livewire\Applicant\Forms;

use Livewire\Component;

class WorkExperienceSheetForm extends Component
{

    public $start;
    public $end;
    public $position;
    public $officeUnit;
    public $supervisor;
    public $agency;
    public $accomplishments;
    public $duties;

    protected $rules = [
        'start' => 'required|date',
        'end' => 'required|date|after_or_equal:start',
        'position' => 'required|string|max:255',
        'officeUnit' => 'required|string|max:255',
        'supervisor' => 'required|string|max:255',
        'agency' => 'required|string|max:255',
        'accomplishments' => 'nullable|string',
        'duties' => 'required|string',
    ];

    public function save()
    {
        $this->validate();

        // Save logic here
        // For example, store the data in the database

        session()->flash('message', 'Work experience saved successfully.');

        // Optionally, reset the form
        $this->reset();
    }
    public function render()
    {
        return view('livewire.applicant.forms.work-experience-sheet-form');
    }
}
