<?php

namespace App\Livewire\AppointingOfficer;

use App\Models\Applicants\Applicant;
use Livewire\Component;

class ReviewCandidateCards extends Component
{

    public $applicants = [];

    public function mount()
    {
        #TODO: Fetch all applicants with 'reviewed' status
        $this->applicants = (new Applicant())->ShowReviewedApplicants()->toArray();
    }
    public function render()
    {
        return view('livewire.appointing-officer.review-candidate-cards');
    }
}
