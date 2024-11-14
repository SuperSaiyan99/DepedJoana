<?php

namespace App\Livewire\Applicant\Forms;

use App\Http\Requests\Applicant\Components\SaveJobPositionRequest;
use App\Services\Applicant\validation\PositionValidator;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddPositions extends Component
{
    public $positions = [
        [
            'office_level' => '',
            'co_strands_region' => '',
            'division_division_office' => '',
            'position' => '',
        ]
    ];

    public $jobVacancies;
    public $applicantChosenVacancy;

    public function addPosition()
    {
        $this->positions[] = [
            'office_level' => '',
            'co_strands_region' => '',
            'division_division_office' => '',
            'position' => '',
        ];
    }

    public function removePosition($index)
    {
        unset($this->positions[$index]);
        $this->positions = array_values($this->positions);
    }

    public function submit()
    {
        $validated = $this->validate(
            PositionValidator::rules(),
            PositionValidator::messages()
        );

        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);

        foreach ($this->positions as $index => $position) {
            $this->applicantChosenVacancy = $position['position'];
        }

        # Loop through each position and update or create applied position
        foreach ($validated['positions'] as $position)
        {
            \App\Services\Queries\QueryService::updateOrCreate('applicant_position_applied', [
                'applicant_id' => $applicantId,
                'vacancy_id' => $this->applicantChosenVacancy
            ], [
                'office_level' => json_encode($position['office_level']),
                'co_strands_region' => json_encode($position['co_strands_region']),
                'division_division_office' => json_encode($position['division_division_office']),
                'status' => 'visitor'
            ]);
        }

        #session store
        session(['applicantChosenVacancy' => $this->applicantChosenVacancy]);

        return redirect('applicant/pds');
    }

    public function mount()
    {
        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);

        $this->jobVacancies = DB::table('vacancies')
                                ->select('id', 'position_title', 'school_level')
                                ->get();
    }


    public function render()
    {
        return view('livewire.applicant.components.add-positions');
    }
}
