<?php

namespace App\Livewire\SelectionBoard;

use Livewire\Component;

class ReviewCandidateCards extends Component
{
    public $applicants = [];

    public function mount()
    {
        #TODO: Fetch all applicants with 'reviewed' status
        #$this->applicants = (new Applicant())->ShowReviewedApplicants()->toArray();
    }


    public function render()
    {
        return view('livewire.selection-board.review-candidate-cards');
    }
}
