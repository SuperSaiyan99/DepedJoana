<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentUploadFiles extends Component
{
    use WithFileUploads;

    public $photos = [];

    #[Validate(['photos.*' => 'required|mimes:pdf|max:102400'])] // 100MB max, PDF only
    public function save()
    {
        $this->validate();
        $path = $this->photo->store(path: 'photos');

        dd($path);
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.document-upload-files');
    }
}
