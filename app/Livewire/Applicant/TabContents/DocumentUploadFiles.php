<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentUploadFiles extends Component
{
    use WithFileUploads;

    public $photo;
    public $uploadProgress = 0;

    public function save()
    {
        $this->validate([
            'photo' => 'required|file|mimes:pdf|max:102400', // 100MB max, PDF only
        ]);

        $path = $this->photo->store('photos', 'public');

        // Reset progress and file input after successful upload
        $this->reset('photo', 'uploadProgress');

        dd($path);
    }

    public function updatedPhoto()
    {
        $this->uploadProgress = 0; // Reset progress when a new file is selected
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.document-upload-files');
    }
}
