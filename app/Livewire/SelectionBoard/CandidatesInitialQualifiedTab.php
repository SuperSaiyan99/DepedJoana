<?php

namespace App\Livewire\SelectionBoard;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class CandidatesInitialQualifiedTab extends Component
{

    public $candidates = [];
    public $vacancyId;
    public $isLoading = false;

    protected $listeners = ['fetch-vacancy-id' => 'handleVacancyId'];

    public function handleVacancyId($vacancyId)
    {
        $this->isLoading = true;

        $this->vacancyId = $vacancyId;

        $this->candidates = $this->showCandidates();

        $this->isLoading = false;
    }

    public function mount()
    {
        #$this->candidates = $this->showCandidates();
    }

    #[On('initial-evaluation-result-saveData')]
    public function saveData()
    {
        $insertedIds = [];


        foreach ($this->candidates as $candidate) {
            $insertedId = DB::table('applicant_interview_status')->insertGetId([
                'applicant_id' => $candidate->applicant_id,
                'vacancy_id' => $candidate->vacancy_id,
                'status' => 'scheduled',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $insertedIds[] = $insertedId;
        }

        $this->dispatch('insertedIds', $insertedIds);

        flash()->success('User saved successfully!');
        $this->dispatch('toastr:success', message: 'Data saved successfully!', notify:'success' );

    }


    public function showCandidates(): array
    {
        return DB::table('applicant_status')
            ->join('applicants', 'applicants.id', '=', 'applicant_status.applicant_id')
            ->join('vacancies', 'vacancies.id', '=', 'applicant_status.vacancy_id')
            ->where('applicant_status.status', 'initial_qualified')
            ->where('applicant_status.vacancy_id', $this->vacancyId)
            ->select('applicants.applicant_code',
                             'vacancies.position_title',
                             'vacancies.school_level',
                             'applicant_status.status',
                             'applicant_status.vacancy_id',
                             'applicant_status.applicant_id'
                     )
            ->get()
            ->toArray();
    }


    public function render()
    {
        return view('livewire.selection-board.candidates-initial-qualified-tab');
    }
}
