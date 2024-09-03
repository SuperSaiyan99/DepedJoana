<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class FamilyForm extends Component
{
    #For Spouse
    public  $spouseSurname, $spouseFirstName, $spouseMiddleName,
            $spouseExtension, $occupation, $businessName,
            $businessAddress, $telephone;
    #For father
    public $fatherSurname, $fatherFirstName, $fatherMiddleName, $fatherExtension;
    #For mother
    public $motherMaidenSurname, $motherFirstName, $motherMiddleName;
    #For Children
    public $children = [];


    public function addChildren ()
    {
        $this->children [] =
            [
                'children_name' => '',
                'children_dob' => ''
            ];
    }

    public function removeChildren($index)
    {
        unset($this->children[$index]);
        $this->children = array_values($this->children);
    }


    public function mount()
    {
        $this->children [] =
            [
                'children_name' => '',
                'children_dob' => ''
            ];
    }

    public function save()
    {
        #TODO: Save information here



        # Message
        session()->flash('message', 'Family information saved successfully.');
    }


    public function render()
    {
        return view('livewire.applicant.tab-contents.family-form');
    }
}
