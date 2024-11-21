<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class ReferencesInformationForm extends Component
{

    public $references = [];
    public $applicantId, $applicantChosenVacancy;

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->applicantChosenVacancy = session('applicantChosenVacancy');

        $this->initializeReferences();
    }

    public function initializeReferences()
    {
        $records = \DB::table('applicant_pds_references')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->get();

        if ($records->isNotEmpty()) {
            $this->references = $records->map(function ($record) {
                return [
                    'name' => $record->name,
                    'address' => $record->address,
                    'telNo' => $record->tel_no,
                ];
            })->toArray();
        } else {
            $this->references = [['name' => '', 'address' => '', 'telNo' => '']];
        }
    }

    public function addReference()
    {
        $this->references[] = ['name' => '', 'address' => '', 'telNo' => ''];
    }

    public function removeReference($index)
    {
        unset($this->references[$index]);
        $this->references = array_values($this->references);
    }

    public function submit()
    {
        $this->validate([
            'references.*.name' => 'required|string|max:255',
            'references.*.address' => 'nullable|string|max:255',
            'references.*.telNo' => 'nullable|string|max:20',
        ]);

        try {
            \DB::beginTransaction();

            if (!$this->applicantId) {
                throw new \Exception('Applicant not found.');
            }
            if (!$this->applicantChosenVacancy) {
                throw new \Exception('Applicant chosen vacancy not found.');
            }

            // Delete old references
            \DB::table('applicant_pds_references')
                ->where('applicant_id', $this->applicantId)
                ->where('vacancy_id', $this->applicantChosenVacancy)
                ->delete();

            // Insert new references
            foreach ($this->references as $reference) {
                \DB::table('applicant_pds_references')->insert([
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy,
                    'name' => $reference['name'],
                    'address' => $reference['address'],
                    'tel_no' => $reference['telNo'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            \DB::commit();

            flash()->success('User saved successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving references.');
            \Log::error($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.references-information-form');
    }
}
