<?php

namespace App\Livewire\SelectionBoard;

use Livewire\Component;

class ObserverFormNotes extends Component
{
    public string $comments = '';



    public function save()
    {
       //TODO: Save $comments in applicant_Observer_Notes_Form table
    }


    public function render()
    {
        return view('livewire.selection-board.observer-form-notes');
    }
}
