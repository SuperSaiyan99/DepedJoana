<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class ReferencesInformationForm extends Component
{

    public $references = [];

    public function mount()
    {
        $this->references = [
            ['name' => '', 'address' => '', 'telNo' => '']
        ];
    }

    public function addReference()
    {
        $this->references[] = ['name' => '', 'address' => '', 'telNo' => ''];
    }

    public function removeReference($index)
    {
        unset($this->references[$index]);
        $this->references = array_values($this->references);
    }

    public function submit()
    {
        dd($this->references);
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.references-information-form');
    }
}
