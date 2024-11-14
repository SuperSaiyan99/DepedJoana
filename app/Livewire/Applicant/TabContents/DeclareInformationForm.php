<?php

namespace App\Livewire\Applicant\TabContents;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class DeclareInformationForm extends Component
{
    use WithFileUploads;

    public $govIssuedID , $idNumber , $dateAccomplished;
    public $datePlaceIssued, $photoUpload , $thumbmarkUpload;
    public $signatureUpload,  $declareOath = false;

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

    public function render()
    {
        return view('livewire.applicant.tab-contents.declare-information-form');
    }



    public function submit()
    {

//        $this->validate();
//
//        $photoPath = $this->photoUpload->store('photos', 'public');
//        $thumbmarkPath = $this->thumbmarkUpload->store('thumbmarks', 'public');
//        $signaturePath = $this->signatureUpload->store('signatures', 'public');
//
//        $data = [
//            $photoPath,
//            $thumbmarkPath,
//            $signaturePath,
//        ];

        # Retrieve the session data and ensure it's available
        $applicantChosenVacancy = session('applicantChosenVacancy');

        if (!$applicantChosenVacancy) {
            dd('No vacancy found in session.');
        }

        dd($applicantChosenVacancy);

        $this->updateApplicantStatus();

    }


    public function updateApplicantStatus()
    {
        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);


        DB::table('applicant_status')
            ->updateOrInsert(
                [
                    'applicant_id' => $applicantId,
                    'vacancy_id' => session('applicantChosenVacancy') # session from AddPost Livewire component passed here
                ],
                [
                    'status' => 'reviewed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
    }


}
