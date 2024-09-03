<?php

namespace App\Livewire\Applicant\TabContents;

use App\Services\Applicant\validation\QuestionsInformationFormValidator;
use Livewire\Component;

class QuestionsInformationForm extends Component
{
    public $q34a, $q34aDetails;
    public $q34b, $q34bDetails;
    public $q35a, $q35aDetails;
    public $q35b, $q35bDetails, $q35bDateFiled, $q35bStatus;
    public $q36, $q36Details;
    public $q37, $q37Details;
    public $q38a, $q38aDetails;
    public $q38b, $q38bDetails;
    public $q39, $q39Details;
    public $q40a, $q40aDetails;
    public $q40b, $q40bDetails;
    public $q40c, $q40cDetails;


    public $questionnaire = [
            'q34a' => '',
            'q34aDetails' => '',
            'q34b' => '',
            'q34bDetails' => '',
            'q35a' => '',
            'q35aDetails' => '',
            'q35b' => '',
            'q35bDetails' => '',
            'q35bDateFiled' => '',
            'q35bStatus' => '',
            'q36' => '',
            'q36Details' => '',
            'q37' => '',
            'q37Details' => '',
            'q38a' => '',
            'q38aDetails' => '',
            'q38b' => '',
            'q38bDetails' => '',
            'q39' => '',
            'q39Details' => '',
            'q40a' => '',
            'q40aDetails' => '',
            'q40b' => '',
            'q40bDetails' => '',
            'q40c' => '',
            'q40cDetails' => '',
        ];



    public function save()
    {
        $validatedData = $this->validate(
            QuestionsInformationFormValidator::rules(),
            QuestionsInformationFormValidator::messages()
        );

        dd($validatedData);
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.questions-information-form');
    }
}
