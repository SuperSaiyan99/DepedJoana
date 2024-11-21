<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;


class FamilyForm extends Component
{
    #For Spouse
    public  $spouseSurname, $spouseFirstName, $spouseMiddleName,
            $spouseExtension, $occupation, $businessName,
            $businessAddress, $telephone;
    #For father
    public $fatherSurname, $fatherFirstName, $fatherMiddleName, $fatherExtension;
    #For mother
    public $motherMaidenSurname, $motherFirstName, $motherMiddleName;
    #For Children
    public $children = [];
    public $applicantChosenVacancy, $applicantId;


    public function render()
    {
        return view('livewire.applicant.tab-contents.family-form');
    }

    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);
        $this->applicantChosenVacancy = session('applicantChosenVacancy');
        $this->getFamilyInformation();

    }

    public function getFamilyInformation()
    {
        $familyBackgroundData = \DB::table('applicant_children')
            ->join('applicant_family_background', 'applicant_family_background.applicant_id', '=', 'applicant_children.applicant_id')
            ->where('applicant_children.applicant_id', $this->applicantId)
            ->where('applicant_children.vacancy_id', $this->applicantChosenVacancy)
            ->first();

        if ($familyBackgroundData) {
            // Populate the children field if data exists
            $this->children = json_decode($familyBackgroundData->children, true);

            // Populate other fields as needed if stored in other tables
            $this->spouseSurname = $familyBackgroundData->spouse_surname ?? 'n/a';
            $this->spouseFirstName = $familyBackgroundData->spouse_first_name ?? 'N/A';
            $this->spouseMiddleName = $familyBackgroundData->spouse_middle_name ?? 'N/A';
            $this->spouseExtension = $familyBackgroundData->spouse_extension ?? 'N/A';
            $this->occupation = $familyBackgroundData->spouse_occupation ?? 'N/A';
            $this->businessName = $familyBackgroundData->spouse_employer_business_name ?? 'N/A';
            $this->businessAddress = $familyBackgroundData->spouse_business_address ?? 'N/A';
            $this->telephone = $familyBackgroundData->spouse_telephone_no ?? 'N/A';
            $this->fatherSurname = $familyBackgroundData->father_surname ?? 'N/A';
            $this->fatherFirstName = $familyBackgroundData->father_first_name ?? 'N/A';
            $this->fatherMiddleName = $familyBackgroundData->father_middle_name ?? 'N/A';
            $this->fatherExtension = $familyBackgroundData->father_extension ?? 'N/A';
            $this->motherMaidenSurname = $familyBackgroundData->mother_surname ?? 'N/A';
            $this->motherFirstName = $familyBackgroundData->mother_first_name ?? 'N/A';
            $this->motherMiddleName = $familyBackgroundData->mother_middle_name ?? 'N/A';
        }else{
            $this->children = [
                [
                    'children_name' => '',
                    'children_dob' => ''
                ]
            ];
        }
    }


    public function addChildren ()
    {
        $this->children [] =
            [
                'children_name' => '',
                'children_dob' => ''
            ];
    }

    public function removeChildren($index)
    {
        unset($this->children[$index]);
        $this->children = array_values($this->children);
    }


    public function save()
    {
        try {

            //initialize session

            \DB::beginTransaction();

            $applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::user()->id);

            \App\Services\Queries\QueryService::updateOrCreate('applicant_family_background', [
                'applicant_id' => $applicantId,
                'vacancy_id' => $this->applicantChosenVacancy
            ], [
                'spouse_surname' => $this->spouseSurname,
                'spouse_first_name' => $this->spouseFirstName,
                'spouse_middle_name' => $this->spouseMiddleName,
                'spouse_name_extension' => $this->spouseExtension,
                'spouse_occupation' => $this->occupation,
                'spouse_employer_business_name' => $this->businessName,
                'spouse_business_address' => $this->businessAddress,
                'spouse_telephone_no' => $this->telephone,
                'father_surname' => $this->fatherSurname,
                'father_first_name' => $this->fatherFirstName,
                'father_middle_name' => $this->fatherMiddleName,
                'father_name_extension' => $this->fatherExtension,
                'mother_surname' => $this->motherMaidenSurname,
                'mother_first_name' => $this->motherFirstName,
                'mother_middle_name' => $this->motherMiddleName,
            ]);


            $children = json_encode($this->children, JSON_UNESCAPED_UNICODE);


            \App\Services\Queries\QueryService::updateOrCreate('applicant_children', [
                'applicant_id' => $applicantId,
                'vacancy_id' => $this->applicantChosenVacancy
            ],  [
                'children' => $children,
                'updated_at' => now(),
            ]);

            // Commit the transaction
            \DB::commit();

            // Flash success message
            session()->flash('message', 'Family information saved successfully.');

        } catch (\Exception $e) {
            # Rollback
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving family information.');


            \Log::error($e->getMessage());
        }
    }

}
