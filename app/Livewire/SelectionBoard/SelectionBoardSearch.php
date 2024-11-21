<?php

namespace App\Livewire\SelectionBoard;

use App\Models\HRMO\JobPosting;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class SelectionBoardSearch extends Component
{

    public $searchTerm = '',
        $searchResults = [],
        $selectedMembers = [],
        $selectedJob;

    public $selectedRoles = [];


    public function mount(JobPosting $jobPosting)
    {
        $this->selectedJob = $jobPosting;


        // After fetching members, process roles
        foreach ($this->selectedMembers as $index => $member) {
            $this->selectedRoles[$index] = $member->role_in_board ?? 'member';
        }
    }


    // Listen for changes in the search term and update search results
    public function updatedSearchTerm()
    {
        $this->searchResults = DB::table('users')
            ->join('user_profile', 'user_profile.user_id', '=', 'users.id')
            ->where('users.name', 'like', '%' . $this->searchTerm . '%')
            ->where('users.role', 'hrmpsb')
            ->select('users.id', 'users.name', 'users.role', 'user_profile.assigned_position')
            ->get()
            ->toArray();
    }


    public function selectMember($memberId)
    {
        $member = DB::table('users')
            ->join('user_profile', 'user_profile.user_id', '=', 'users.id')
            ->where('users.id', $memberId)
            ->where('users.role', 'hrmpsb')
            ->select('users.id', 'users.name', 'users.role', 'user_profile.assigned_position')
            ->first();

        if ($member && !in_array($member, $this->selectedMembers)) {
            $this->selectedMembers[] = (array) $member;
            // Initialize role with default value (e.g., 'member')
            $this->selectedRoles[] = 'member';
        }

        $this->resetSearch();
    }

    // Remove a member from the selectedMembers array
    public function removeMember($index)
    {
        unset($this->selectedMembers[$index]);
        unset($this->selectedRoles[$index]);
        $this->selectedMembers = array_values($this->selectedMembers);
        $this->selectedRoles = array_values($this->selectedRoles);
    }

    #[On('initial-evaluation-result-saveData')]
    public function saveRole($jobId)
    {
        foreach ($this->selectedMembers as $index => $selectedMember) {
            $newRole = $this->selectedRoles[$index];

           # logger('Saving role:', ['user_id' => $selectedMember['id'], 'role' => $newRole]);

            DB::table('selection_board')
                ->updateOrInsert(
                    [
                        'user_id' => $selectedMember['id'],
                        'vacancy_id' => $jobId
                    ],
                    [
                        'role_in_board' => $newRole,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
        }

        // Optionally flash a message to notify the user
        session()->flash('message', 'Roles updated successfully for selected members.');
    }



    public function resetSearch()
    {
        $this->searchTerm = '';
        $this->searchResults = [];
    }

    // Render the component
    public function render()
    {
        return view('livewire.selection-board.selection-board-search');
    }
}
