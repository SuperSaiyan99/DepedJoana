<?php

namespace App\Livewire\Applicant\TabContents;

use App\Services\Applicant\validation\EducationalBackgroundValidator;
use DB;
use Livewire\Component;

class EducationalBackground extends Component
{
    public $education = [
        'elementary' => [],
        'secondary' => [],
        'vocational' => [],
        'college' => [],
        'graduate' => []
    ];

    public $applicantChosenVacancy, $applicantId;

    public function mount()
    {
        // Fetch the applicant ID based on the authenticated user
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->applicantChosenVacancy = session('applicantChosenVacancy');

        // Fetch educational background data for the applicant and selected vacancy
        $ApplicantEducationalBackground = \DB::table('applicant_educational_backgrounds')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->applicantChosenVacancy)
            ->first();

        if ($ApplicantEducationalBackground) {
            // Decode JSON fields and initialize the `education` property
            $this->education = [
                'elementary' => json_decode($ApplicantEducationalBackground->elementary, true) ?? [],
                'secondary' => json_decode($ApplicantEducationalBackground->secondary, true) ?? [],
                'vocational' => json_decode($ApplicantEducationalBackground->vocational, true) ?? [],
                'college' => json_decode($ApplicantEducationalBackground->college, true) ?? [],
                'graduate' => json_decode($ApplicantEducationalBackground->graduate, true) ?? [],
            ];
        } else {
            // Initialize `education` with empty arrays if no record exists
            $this->education = [
                'elementary' => [],
                'secondary' => [],
                'vocational' => [],
                'college' => [],
                'graduate' => [],
            ];
        }
    }



    public function render()
    {
        return view('livewire.applicant.tab-contents.educational-background');
    }


    public function save()
    {
        EducationalBackgroundValidator::rules();

        try {

            DB::beginTransaction();

            \App\Services\Queries\QueryService::updateOrCreate('applicant_educational_backgrounds', [
                'applicant_id' => $this->applicantId,
                'vacancy_id' => $this->applicantChosenVacancy,
            ], [
                'elementary' => json_encode($this->education['elementary'] ?? []),
                'secondary' => json_encode($this->education['secondary'] ?? []),
                'vocational' => json_encode($this->education['vocational'] ?? []),
                'college' => json_encode($this->education['college'] ?? []),
                'graduate' => json_encode($this->education['graduate'] ?? []),
            ]);

            // Commit the transaction
            DB::commit();

            // Flash success message
            session()->flash('message', 'Educational Background saved successfully.');

        } catch (\Exception $e) {
            # Rollback
            DB::rollBack();

            session()->flash('error', 'An error occurred while saving Educational Background.');

            // Log the error and flash an error message
            \Log::error($e->getMessage());
        }
    }
}
