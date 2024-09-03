<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class OtherInformationForm extends Component
{
    public $skills = [];
    public $recognition = [];
    public $membership = [];

    public function mount()
    {
        $this->initializeFields();
    }

    public function initializeFields()
    {
        $this->skills[] = '';
        $this->recognition[] = '';
        $this->membership[] = '';
    }

    public function addField(&$field)
    {
        $field[] = '';
    }

    public function removeField(&$field, $index)
    {
        unset($field[$index]);
        $field = array_values($field);
    }

    public function addSkills()
    {
        $this->addField($this->skills);
    }

    public function addRecognition()
    {
        $this->addField($this->recognition);
    }

    public function addMembership()
    {
        $this->addField($this->membership);
    }

    public function removeSkills($index)
    {
        $this->removeField($this->skills, $index);
    }

    public function removeRecognition($index)
    {
        $this->removeField($this->recognition, $index);
    }

    public function removeMembership($index)
    {
        $this->removeField($this->membership, $index);
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.other-information-form');
    }
}
