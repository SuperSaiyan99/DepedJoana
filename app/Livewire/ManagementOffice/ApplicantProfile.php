<?php

namespace App\Livewire\ManagementOffice;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApplicantProfile extends Component
{

    public  $applicantId = null,
            $applicant = null,
            $vacancyId = null,
            $ManagementOfficerId = null;

    public  $increment_values_education = [],
            $increment_values_training = [],
            $increment_values_workExperience = [];


        // Criteria Fields
    public $criteria = [
        'training' => ['status' => '', 'increment_level' => ''],
        'education' => ['status' => '', 'increment_level' => ''],
        'experience' => ['status' => '', 'increment_level' => ''],
    ];

    protected $listeners = [
         'selected-applicant' => 'loadApplicant',
    ];


    #=======[IMPORTANT THINGS]================
    public function render()
    {
        return view('livewire.management-office.applicant-profile');
    }

    public function mount()
    {
        $this->increment_values_education = $this->getIncrementValues('education');
        $this->increment_values_training = $this->getIncrementValues('training');
        $this->increment_values_workExperience = $this->getIncrementValues('experience');
    }

    
    #=======[FUNCTIONS]================
    public function approveApplicant()
    {
        $this->saveIncrements();

        $this->UpdateApplicantStatusInitialQualified();

        session()->flash('message', 'Applicant has been marked as qualified.');

        $this->dispatch('refresh-applicant-list');

        $this->dispatch('close-approval-modal');

        $this->dispatch('show-toast', ['message' => 'Application approved successfully!']);
    }

    public function getIncrementValues($increment_type)
    {
       return DB::table('increments_table')
            ->where('increments_type', $increment_type)
            ->get();
    }


    public function loadApplicant($applicantId)
    {
        $this->applicantId = $applicantId;

        # Fetch applicants based on the selected vacancy ID
        $applicantsInformation =  DB::table('applicants')
            ->join('applicant_status', 'applicants.id', '=', 'applicant_status.applicant_id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->join('applicant_residential_address', 'applicants.id', '=', 'applicant_residential_address.applicant_id')
            ->join('applicant_permanent_address', 'applicants.id', '=', 'applicant_permanent_address.applicant_id')
            ->join('applicant_contact_information', 'applicants.id', '=', 'applicant_contact_information.applicant_id')
            ->join('vacancies', 'applicant_status.vacancy_id', '=', 'vacancies.id')
            ->where([
                ['applicant_status.status', 'reviewed'],
                ['applicants.id', $this->applicantId],
            ])
            ->select(['applicants.*',
                      'vacancies.*',
                      'applicant_personal_information.*',
                      'applicant_residential_address.*',
                      'applicant_permanent_address.*',
                      'applicant_contact_information.*',
                      'applicant_status.*',
                ])
            ->first();

        # Assign the fetched vacancy_id to the public property
        if ($applicantsInformation) {
            $this->vacancyId = $applicantsInformation->vacancy_id;
            $this->applicantId = $applicantsInformation->applicant_id;
        }

        # Store the applicant information
        $this->applicant = $applicantsInformation ?? [];

        #dd($this->applicant);

    }

    public function saveIncrements()
    {
        $this->ManagementOfficerId = auth()->user()->id;

        DB::table('applicant_increments_score')->updateOrInsert(
            [
                'vacancy_id' => $this->vacancyId,
                'applicant_id' => $this->applicantId,
            ],
            [
                // Criteria descriptions and increment levels
                'training_criteria_description' => 'Training',
                'training_increment_level' => $this->criteria['training']['increment_level'],
                'education_criteria_description' => 'Education',
                'education_increment_level' => $this->criteria['education']['increment_level'],
                'experience_criteria_description' => 'Experience',
                'experience_increment_level' => $this->criteria['experience']['increment_level'],

                // Criteria status
                'training_criteria_status' => $this->criteria['training']['status'],
                'education_criteria_status' => $this->criteria['education']['status'],
                'experience_criteria_status' => $this->criteria['experience']['status'],

                // Management officer
                'management_officer_id' => $this->ManagementOfficerId,

                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

    }

    public function UpdateApplicantStatusInitialQualified()
    {
       return DB::table('applicant_status')
            ->where('applicant_id', $this->applicantId)
            ->update([
                'status' => 'initial_qualified'
            ]);
    }

    function calculateETEIcrements(int $applicantLevel, int $baselineLevel): int
    {
        return $applicantLevel - $baselineLevel;
    }

    function calculateETEPoints(int $increments): int
    {
        if ($increments >= 10) {
            return 10;
        } elseif ($increments >= 8) {
            return 8;
        } elseif ($increments >= 6) {
            return 6;
        } elseif ($increments >= 4) {
            return 4;
        } elseif ($increments >= 2) {
            return 2;
        } else {
            return 0; // Meeting minimum QS
        }
    }


}
