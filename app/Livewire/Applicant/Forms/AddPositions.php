<?php

namespace App\Livewire\Applicant\Forms;

use App\Http\Requests\Applicant\Components\SaveJobPositionRequest;
use App\Services\Applicant\validation\PositionValidator;
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
        $this->validate(
            PositionValidator::rules(),
            PositionValidator::messages(),
        );

        // Process the $positions data here (e.g., save to database)
        dd($this->positions);
    }

    public function render()
    {
        return view('livewire.applicant.components.add-positions');
    }
}
