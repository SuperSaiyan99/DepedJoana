<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class TrainingProgramsForm extends Component
{
    public $ldPrograms = [];

    public function mount()
    {
        // Initialize with one empty entry
        $this->ldPrograms[] = $this->emptyLdProgram();
    }

    public function emptyLdProgram()
    {
        return [
            'programTitle' => '',
            'fromDate' => '',
            'toDate' => '',
            'hours' => '',
            'typeOfLD' => '',
            'conductedBy' => '',
        ];
    }

    public function addLdProgram()
    {
        $this->ldPrograms[] = $this->emptyLdProgram();
    }

    public function removeLdProgram($index)
    {
        unset($this->ldPrograms[$index]);
        $this->ldPrograms = array_values($this->ldPrograms);
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.training-programs-form');
    }
}
