<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class OtherInformationForm extends Component
{
    public $skills = [];
    public $recognition = [];
    public $membership = [];
    public $applicantId, $applicantChosenVacancy;

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->applicantChosenVacancy = session('applicantChosenVacancy');
        $this->initializeFields();
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.other-information-form');
    }

    public function initializeFields()
    {
        $record = \DB::table('applicant_other_informations')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->first();

        $this->skills = $record ? json_decode($record->skills, true) : [''];
        $this->recognition = $record ? json_decode($record->recognition, true) : [''];
        $this->membership = $record ? json_decode($record->membership, true) : [''];
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

    public function save()
    {
        // Validation rules
        $this->validate([
            'skills.*' => 'nullable|string|max:255',
            'recognition.*' => 'nullable|string|max:255',
            'membership.*' => 'nullable|string|max:255',
        ]);

        try {
            \DB::beginTransaction();

            if (!$this->applicantId) {
                throw new \Exception('Applicant not found.');
            }
            if (!$this->applicantChosenVacancy) {
                throw new \Exception('Applicant chosen vacancy not found.');
            }

            // Update or create the record
            \App\Services\Queries\QueryService::updateOrCreate('applicant_other_informations',
                [
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy,
                ],
                [
                    'skills' => json_encode($this->skills),
                    'recognition' => json_encode($this->recognition),
                    'membership' => json_encode($this->membership),
                ]);

            \DB::commit();

            session()->flash('message', 'Other information saved successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving other information.');
            \Log::error($e->getMessage());
        }
    }


}
