<?php

namespace App\Livewire\AppointingOfficer\Demographics;

use Livewire\Component;

class RecruitmentTrendsAndDemographics extends Component
{

    public $recruitmentTrendsChartData = [
        ['Month' => 'January', 'Value' => 5],
        ['Month' => 'February', 'Value' => 4],
        ['Month' => 'March', 'Value' => 3],
        ['Month' => 'April', 'Value' => 2],
        ['Month' => 'May', 'Value' => 1],
        ['Month' => 'June', 'Value' => 1],
        ['Month' => 'July', 'Value' => 2],
        ['Month' => 'August', 'Value' => 1],
        ['Month' => 'September', 'Value' => 2],
        ['Month' => 'October', 'Value' => 1],
        ['Month' => 'November', 'Value' => 2],
        ['Month' => 'December', 'Value' => 1],
    ];

    public $applicantDemographicsData = [
        ['Month' => 'January', 'Value' => 25],
        ['Month' => 'February', 'Value' => 24],
        ['Month' => 'March', 'Value' => 33],
        ['Month' => 'April', 'Value' => 22],
        ['Month' => 'May', 'Value' => 31],
        ['Month' => 'June', 'Value' => 31],
        ['Month' => 'July', 'Value' => 32],
        ['Month' => 'August', 'Value' => 21],
        ['Month' => 'September', 'Value' => 32],
        ['Month' => 'October', 'Value' => 1],
        ['Month' => 'November', 'Value' => 2],
        ['Month' => 'December', 'Value' => 1],
    ];

    public function render()
    {
        return view('livewire.appointing-officer.demographics.recruitment-trends-and-demographics');
    }
}


