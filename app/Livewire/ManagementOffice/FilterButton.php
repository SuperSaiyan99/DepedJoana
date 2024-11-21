<?php

namespace App\Livewire\ManagementOffice;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FilterButton extends Component
{
    public $FilterVacancies = [];
    public $vacancyId = null;
    public $sortType = null;


    public function mount()
    {
        $this->loadFilterVacancies();
    }

    public function render()
    {
        return view('livewire.management-office.filter-button', [
            'FilterVacancies' => $this->FilterVacancies,
        ]);
    }



    public function loadFilterVacancies()
    {
        $query = DB::table("vacancies")
            ->join('applicant_status', 'vacancies.id', '=', 'applicant_status.vacancy_id')
            ->select('vacancies.id', 'position_title', 'vacancy_type', 'school_level')
            ->where('vacancies.status', 'On_going');


        if ($this->sortType == 'teaching') {

            $query->where('vacancy_type', 'teaching');

        }
        else if ($this->sortType == 'non-teaching'){
            $query->where('vacancy_type', 'non-teaching');
        }

        $query->groupBy('vacancies.id', 'vacancies.position_title', 'vacancies.vacancy_type', 'vacancies.school_level');
        $query->havingRaw('COUNT(applicant_status.vacancy_id) > 0');

        $this->FilterVacancies = $query->get();
    }


    public function updateSort()
    {
        $this->loadFilterVacancies();
    }

    public function updateFilterVacancies()
    {
        // Dispatch the event with the selected vacancyId
        $this->dispatch('update-vacancy-filter', ['id' => $this->vacancyId]);
    }

}
