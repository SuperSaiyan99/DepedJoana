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

    public $questionnaire = [];
    public $applicantId, $applicantChosenVacancy;


    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->applicantChosenVacancy = session('applicantChosenVacancy');

        $this->initializeQuestionnaire();
    }

    public function initializeQuestionnaire()
    {
        $record = \DB::table('applicant_pds_questions')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->first();

        if ($record) {
            foreach ($record as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function defaultQuestionnaire()
    {
        return [
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
    }

    public function save()
    {
        $validatedData = $this->validate(
            QuestionsInformationFormValidator::rules(),
            QuestionsInformationFormValidator::messages()
        );

        try {
            \DB::beginTransaction();

            if (!$this->applicantId) {
                throw new \Exception('Applicant not found.');
            }
            if (!$this->applicantChosenVacancy) {
                throw new \Exception('Applicant chosen vacancy not found.');
            }

            \App\Services\Queries\QueryService::updateOrCreate('applicant_pds_questions',
                [
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy,
                ],
                $this->getQuestionnaireData()
            );

            \DB::commit();

            session()->flash('message', 'Questionnaire saved successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving the questionnaire.');
            \Log::error($e->getMessage());
        }
    }

    public function getQuestionnaireData()
    {
        return collect(get_object_vars($this))
            ->filter(function ($value, $key) {
                return in_array($key, [
                    'q34a', 'q34aDetails', 'q34b', 'q34bDetails', 'q35a', 'q35aDetails',
                    'q35b', 'q35bDetails', 'q35bDateFiled', 'q35bStatus', 'q36', 'q36Details',
                    'q37', 'q37Details', 'q38a', 'q38aDetails', 'q38b', 'q38bDetails',
                    'q39', 'q39Details', 'q40a', 'q40aDetails', 'q40b', 'q40bDetails',
                    'q40c', 'q40cDetails',
                ]);
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.questions-information-form');
    }
}
