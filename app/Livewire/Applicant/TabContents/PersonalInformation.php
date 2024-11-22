<?php

namespace App\Livewire\Applicant\TabContents;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PersonalInformation extends Component
{
    public $personalInformation = [
            'surname' => '',
            'first_name' => '',
            'middle_name' => '',
            'name_extension' => '',
            'date_of_birth' => '',
            'place_of_birth' => '',
            'sex' => '',
            'civil_status' => '',
            'height' => '',
            'weight' => '',
            'blood_type' => '',
            'religion' => '',
            'gsis_id_no' => '',
            'pag_ibig_id_no' => '',
            'philhealth_no' => '',
            'sss_no' => '',
            'tin_no' => '',
            'agency_employee_no' => '',
            'citizenship' => '',
            'citizenship_type' => '',
            'country_if_dual_citizenship' => '',
            'ethnicity' => '',
            'is_solo_parent' => 0,
    ];

    public $residential_address = [
        'house_number' => '',
        'street' => '',
        'village' => '',
        'barangay' => '',
        'city' => '',
        'province' => '',
        'zipcode_code' => '',
    ];

    public $permanent_address = [
        'house_number' => '',
        'street' => '',
        'subdivision' => '',
        'barangay' => '',
        'city' => '',
        'province' => '',
        'zipcode_code' => '',
    ];

    public $contact_information = [
        'telephone_no' => '',
        'mobile_no' => '',
        'email_address' => '',
    ];

    private $applicantChosenVacancy;

    public function mount()
    {
        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->applicantChosenVacancy = session('applicantChosenVacancy');

        $this->mountAllData($applicantId);
    }


    public function mountAllData($applicantId)
    {
        $personalInfo = DB::table('applicant_personal_information')->where('applicant_id', $applicantId)->first();
        $residentialAddress = DB::table('applicant_residential_address')->where('applicant_id', $applicantId)->first();
        $permAddress = DB::table('applicant_permanent_address')->where('applicant_id', $applicantId)->first();
        $contactInfo = DB::table('applicant_contact_information')->where('applicant_id', $applicantId)->first();


        $this->personalInformation = $personalInfo ? (array) $personalInfo : $this->emptyPersonalInformation();
        $this->residential_address = $residentialAddress ? (array) $residentialAddress : $this->emptyResidentialAddress();
        $this->permanent_address   = $permAddress ? (array) $permAddress : $this->emptyPermanent_Address();
        $this->contact_information = $contactInfo ? (array) $contactInfo : $this->emptyContactInformation();
    }

    public function save()
    {
        $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);

        #PersonalInfo Create/Update
        \App\Services\Queries\QueryService::updateOrCreate(
            'applicant_personal_information',[
            'applicant_id' => $applicantId,
            'vacancy_id' =>$this->applicantChosenVacancy
            ],
            $this->personalInformation
        );

        #residential address Create/Update
        \App\Services\Queries\QueryService::updateOrCreate(
            'applicant_residential_address',
            ['applicant_id' => $applicantId],
            $this->residential_address
        );

        #Permanent Address Create/Update
        \App\Services\Queries\QueryService::updateOrCreate(
            'applicant_permanent_address',
            ['applicant_id' => $applicantId],
            $this->permanent_address
        );

        #Conact Info Create/Update
        \App\Services\Queries\QueryService::updateOrCreate(
            'applicant_contact_information',
            ['applicant_id' => $applicantId],
            $this->contact_information
        );

        session()->flash('message', 'Personal data saved successfully.');
    }


    public function render()
    {
        return view('livewire.applicant.tab-contents.personal-information');
    }



    #External Functions
    public function emptyContactInformation()
    {
        return [
            'telephone_no' => '',
            'mobile_no' => '',
            'email_address' => '',
        ];
    }

    public function emptyPermanent_Address()
    {
        return [
            'house_number' => '',
            'street' => '',
            'village' => '',
            'barangay' => '',
            'province' => '',
            'zipcode_code' => '',
        ];
    }

    public function emptyResidentialAddress()
    {
        return [
            'house_number' => '',
            'street' => '',
            'village' => '',
            'barangay' => '',
            'province' => '',
            'zipcode_code' => '',
        ];
    }


    public function emptyPersonalInformation()
    {
        return [
            'surname' => '',
            'first_name' => '',
            'middle_name' => '',
            'name_extension' => '',
            'date_of_birth' => '',
            'place_of_birth' => '',
            'sex' => '',
            'civil_status' => '',
            'height' => '',
            'weight' => '',
            'blood_type' => '',
            'gsis_id_no' => '',
            'pag_ibig_id_no' => '',
            'philhealth_no' => '',
            'sss_no' => '',
            'tin_no' => '',
            'agency_employee_no' => '',
            'citizenship' => '',
            'citizenship_type' => '',
            'country_if_dual_citizenship' => '',
        ];
    }
}
