<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class EligibilityForm extends Component
{
    public $eligibilities = [];

    public $applicantId, $vacancyId;



    public function mount()
    {
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->vacancyId = session('applicantChosenVacancy');

        $eligibilitiesData = \DB::table('applicant_eligibilities')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->vacancyId)
            ->get(); // Fetch multiple rows

        if ($eligibilitiesData->isEmpty()) {
            $this->eligibilities = [
                [
                    'career_service' => '',
                    'eligibility_rating' => '',
                    'date_of_exam' => '',
                    'place_of_exam' => '',
                    'license_number' => '',
                    'date_of_validity' => ''
                ]
            ];
        } else {
            $this->eligibilities = $eligibilitiesData->map(function ($data) {
                return [
                    'career_service' => $data->career_service ?? '',
                    'eligibility_rating' => $data->eligibility_rating ?? '',
                    'date_of_exam' => $data->date_of_exam ?? '',
                    'place_of_exam' => $data->place_of_exam ?? '',
                    'license_number' => $data->license_number ?? '',
                    'date_of_validity' => $data->date_of_validity ?? ''
                ];
            })->toArray();
        }
    }


    public function addEligibility()
    {
        $this->eligibilities[] =
            [
                'career_service' => '',
                'eligibility_rating' => '',
                'date_of_exam' => '',
                'place_of_exam' => '',
                'license_number' => '',
                'date_of_validity' => ''
            ];
    }

    public function removeEligibility($index)
    {
        unset($this->eligibilities[$index]);
        $this->eligibilities = array_values($this->eligibilities); // Reindex the array
    }

    public function save()
    {
        $this->validate([
            'eligibilities.*.career_service' => 'nullable|string|max:255',
            'eligibilities.*.eligibility_rating' => 'nullable|string|max:255',
            'eligibilities.*.date_of_exam' => 'nullable|date',
            'eligibilities.*.place_of_exam' => 'nullable|string|max:255',
            'eligibilities.*.license_number' => 'nullable|string|max:255',
            'eligibilities.*.date_of_validity' => 'nullable|date',
        ]);

        try {
            \DB::beginTransaction();
            
            // Delete old entries before saving new ones to avoid duplication
            \DB::table('applicant_eligibilities')
                ->where('applicant_id', $this->applicantId)
                ->where('vacancy_id', $this->vacancyId)
                ->delete();

            // Save each eligibility record
            foreach ($this->eligibilities as $eligibility) {
                \DB::table('applicant_eligibilities')->insert([
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->vacancyId,
                    'career_service' => $eligibility['career_service'],
                    'eligibility_rating' => $eligibility['eligibility_rating'],
                    'date_of_exam' => $eligibility['date_of_exam'],
                    'place_of_exam' => $eligibility['place_of_exam'],
                    'license_number' => $eligibility['license_number'],
                    'date_of_validity' => $eligibility['date_of_validity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            \DB::commit();

            session()->flash('message', 'Eligibility data saved successfully.');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving eligibility data.');
            \Log::error($e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.applicant.tab-contents.eligibility-form');
    }
}


