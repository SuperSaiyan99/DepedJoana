<?php

namespace App\Livewire\Applicant\Forms;

use Livewire\Component;

class ApplicantStatus extends Component
{
   public $applicantId;
   public $vacancyId;
   public $applicantData;

    public function render()
    {
        return view('livewire.applicant.forms.applicant-status');
    }

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->vacancyId = session('applicantChosenVacancy');

        if (!$this->applicantId || !$this->vacancyId) {
            flash()->warning('Session Timeout, Returning to Home Page');
            return redirect()->route('applicants.home');
        }

        $this->applicantData = $this->fetchApplicantStatusInfo();

    }

    public function fetchApplicantStatusInfo()
    {
        return \DB::table('applicant_status')
            ->join('vacancies', 'vacancies.id', '=', 'applicant_status.vacancy_id')
            ->join('applicants', 'applicants.id', '=', 'applicant_status.applicant_id')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->vacancyId)
            ->select([
                'applicant_status.status',
                'applicant_status.reason',
                'vacancies.vacancy_code',
                'applicants.applicant_code',
            ])
            ->first();
    }


}
