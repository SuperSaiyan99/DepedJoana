<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;
use Livewire\WithFileUploads;

class DeclareInformationForm extends Component
{
    use WithFileUploads;

    public $govIssuedID;
    public $idNumber;
    public $dateAccomplished;
    public $datePlaceIssued;
    public $photoUpload;
    public $thumbmarkUpload;
    public $signatureUpload;
    public $declareOath = false;

    protected $rules = [
        'govIssuedID' => 'required|string|max:255',
        'idNumber' => 'required|string|max:255',
        'dateAccomplished' => 'required|date',
        'datePlaceIssued' => 'required|string|max:255',
        'photoUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'thumbmarkUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signatureUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'declareOath' => 'accepted',
    ];


    public function submit()
    {

        $this->validate();

        $photoPath = $this->photoUpload->store('photos', 'public');
        $thumbmarkPath = $this->thumbmarkUpload->store('thumbmarks', 'public');
        $signaturePath = $this->signatureUpload->store('signatures', 'public');

        $data = [
            $photoPath,
            $thumbmarkPath,
            $signaturePath,
        ];

        dd($data);
    }


    public function render()
    {
        return view('livewire.applicant.tab-contents.declare-information-form');
    }
}
