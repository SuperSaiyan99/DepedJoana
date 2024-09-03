<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class EligibilityForm extends Component
{
    public $eligibilities = [];


    public function mount()
    {
        $this->eligibilities = [
            [
                'career_service' => '',
                'eligibility_rating' => '',
                'date_of_exam' => '',
                'place_of_exam' => '',
                'license_number' => '',
                'date_of_validity' => ''
            ]
        ];
    }

    public function addEligibility()
    {
        $this->eligibilities[] =
            [
                'career_service' => '',
                'eligibility_rating' => '',
                'date_of_exam' => '',
                'place_of_exam' => '',
                'license_number' => '',
                'date_of_validity' => ''
            ];
    }

    public function removeEligibility($index)
    {
        unset($this->eligibilities[$index]);
        $this->eligibilities = array_values($this->eligibilities); // Reindex the array
    }

    public function save()
    {

        #TODO: Save data here
        foreach ($this->eligibilities as $eligibility) {
            // Save each eligibility entry to the database


        }

        session()->flash('message', 'Eligibility data saved successfully.');
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.eligibility-form');
    }
}


