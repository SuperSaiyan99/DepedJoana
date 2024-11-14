<?php

namespace App\Livewire\SelectionBoard;

use App\Models\Applicants\Applicant;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApplicantSideBar extends Component
{
    public $applicants = [];
    public $vacancyId = null;
    public $selectedApplicantId = null;


    protected $listeners = [
        'update-vacancy-filter' => 'filterApplicantsByVacancy',
        'refresh-applicant-list' => 'refreshApplicants',
    ];


    public function mount()
    {
        // Fetch all applicants with 'reviewed' status initially
        $this->loadApplicants();
    }

    public function render()
    {
        return view('livewire.selection-board.applicant-side-bar');
    }


    public function refreshApplicants()
    {
        $this->loadApplicants();
    }

    public function loadApplicants()
    {
        $this->applicants = (new Applicant())->ShowSemiApprovedApplicants()->toArray();
    }

    public function SelectedApplicant($applicantId)
    {

        $this->selectedApplicantId = $applicantId;

        $this->dispatch('selected-applicant', ['applicantId' => $applicantId]);

    }


    public function filterApplicantsByVacancy($id)
    {
        $this->vacancyId = $id;

        # Fetch applicants based on the selected vacancy ID
        $applicants =  DB::table('applicant_status')
            ->join('applicants', 'applicant_status.applicant_id', '=', 'applicants.id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->where([
                ['applicant_status.status', 'initial_qualified'],
                ['applicant_status.vacancy_id', $this->vacancyId],
            ])
            ->select(['applicants.*',
                     'applicant_personal_information.first_name',
                      'applicant_personal_information.middle_name',
                      'applicant_personal_information.middle_name',
                      'applicant_personal_information.place_of_birth',
                      'applicant_status.applicant_id'
                    ])
            ->get()
            ->toArray();

        # If no applicants found, ensure the applicants array is empty
        $this->applicants = count($applicants) > 0 ? $applicants : [];

        #dd($this->applicants);

    }

}
