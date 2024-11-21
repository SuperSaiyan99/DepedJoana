<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class TrainingProgramsForm extends Component
{
    public $ldPrograms = [
        'programTitle' => '',
        'fromDate' => '',
        'toDate' => '',
        'hours' => '',
        'typeOfLD' => '',
        'conductedBy' => '',
    ];
    public $applicantId, $applicantChosenVacancy;

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->applicantChosenVacancy = session('applicantChosenVacancy');
        $this->getTrainingPrograms();

    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.training-programs-form');
    }

    public function getTrainingPrograms()
    {
        $record = \DB::table('applicant_training_programs')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->first();

        $this->ldPrograms = $record ? json_decode($record->training_programs_json, true) : [$this->emptyLdProgram()];
    }


    #====================[OTHER FUNCTIONS]==================================

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


    public function save()
    {
        $this->validate([
            'ldPrograms.*.programTitle' => 'required|string',
            'ldPrograms.*.fromDate' => 'required|date',
            'ldPrograms.*.toDate' => 'required|date',
            'ldPrograms.*.hours' => 'required|integer',
            'ldPrograms.*.typeOfLD' => 'required|string',
            'ldPrograms.*.conductedBy' => 'required|string',
        ]);

        try {
            \DB::beginTransaction();

            if (! $this->applicantId) {
                throw new \Exception('Applicant not found.');
            } if (! $this->applicantChosenVacancy) {
                throw new \Exception('applicantChosenVacancy not found.');
            }


            \App\Services\Queries\QueryService::updateOrCreate('applicant_training_programs', [
                'applicant_id' => $this->applicantId,
                'vacancy_id' => $this->applicantChosenVacancy
            ], [
                'training_programs_json' => json_encode($this->ldPrograms, true, JSON_UNESCAPED_UNICODE),
            ]);


            \DB::commit();

            session()->flash('message', 'Training programs saved successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving Training programs.');
            \Log::error($e->getMessage());
        }
    }


}
