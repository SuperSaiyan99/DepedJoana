<?php

namespace App\Livewire\Applicant\Forms;

use Livewire\Component;

class WorkExperienceSheetForm extends Component
{
    public $workExperiences = [];
    public $applicantId;
    public $applicantChosenVacancy;

    protected $rules = [
        'workExperiences.*.start' => 'required|date',
        'workExperiences.*.end' => 'required|date|after_or_equal:workExperiences.*.start',
        'workExperiences.*.position' => 'required|string|max:255',
        'workExperiences.*.officeUnit' => 'required|string|max:255',
        'workExperiences.*.supervisor' => 'required|string|max:255',
        'workExperiences.*.agency' => 'required|string|max:255',
        'workExperiences.*.accomplishments' => 'nullable|string',
        'workExperiences.*.duties' => 'required|string',
    ];

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->applicantChosenVacancy = session('applicantChosenVacancy');

        $this->loadWorkExperiences();
    }

    public function loadWorkExperiences()
    {
        $records = \DB::table('applicant_work_experience_sheet')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->get();

        $this->workExperiences = $records->isNotEmpty() ? $records->map(function ($record) {
            return [
                'start' => $record->start,
                'end' => $record->end,
                'position' => $record->position,
                'officeUnit' => $record->office_unit,
                'supervisor' => $record->supervisor,
                'agency' => $record->agency,
                'accomplishments' => $record->accomplishments,
                'duties' => $record->duties,
            ];
        })->toArray() : [
            ['start' => '', 'end' => '', 'position' => '', 'officeUnit' => '', 'supervisor' => '', 'agency' => '', 'accomplishments' => '', 'duties' => '']
        ];
    }

    public function addWorkExperience()
    {
        // Add a new empty work experience form
        $this->workExperiences[] = [
            'start' => '',
            'end' => '',
            'position' => '',
            'officeUnit' => '',
            'supervisor' => '',
            'agency' => '',
            'accomplishments' => '',
            'duties' => '',
        ];
    }

    public function removeWorkExperience($index)
    {
        // Remove work experience at the given index
        unset($this->workExperiences[$index]);
        $this->workExperiences = array_values($this->workExperiences); // Re-index the array
    }

    public function save()
    {
        $validatedData = $this->validate();
        
        if (! $validatedData)
        {
            flash()->error('There was an error in the data. Please check your inputs and try again.');
        }

        try {
            \DB::beginTransaction();

            \DB::table('applicant_work_experience_sheet')
                ->where('applicant_id', $this->applicantId)
                ->where('vacancy_id', $this->applicantChosenVacancy)
                ->delete();

            // Insert new work experiences
            foreach ($this->workExperiences as $experience) {
                \DB::table('applicant_work_experience_sheet')->insert([
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->applicantChosenVacancy,
                    'start' => $experience['start'],
                    'end' => $experience['end'],
                    'position' => $experience['position'],
                    'office_unit' => $experience['officeUnit'],
                    'supervisor' => $experience['supervisor'],
                    'agency' => $experience['agency'],
                    'accomplishments' => $experience['accomplishments'],
                    'duties' => $experience['duties'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            \DB::commit();
            flash()->success('Work experiences saved successfully!');
        } catch (\Exception $e) {
            \DB::rollBack();
            flash()->error('error occured' . $e->getMessage());
            \Log::error($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.applicant.forms.work-experience-sheet-form');
    }
}
