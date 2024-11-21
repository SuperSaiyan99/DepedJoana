<?php

namespace App\Livewire\SelectionBoard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InterviewDateScheduleTab extends Component
{
    public $co_interview_date, $nco_interview_date;


    protected $listeners = [
        'insertedIds' => 'saveInterviewDates',
    ];
    public function saveInterviewDates($ids): void
    {
        foreach ($ids as $id) {
            DB::table('applicant_interview_status')
                ->where('id', $id)
                ->update([
                    'co_interview_date' => $this->co_interview_date,
                    'nco_interview_date' => $this->nco_interview_date,
                ]);
        }
    }


    public function render()
    {
        return view('livewire.selection-board.interview-date-schedule-tab');
    }
}
