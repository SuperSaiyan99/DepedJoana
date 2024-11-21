<?php

namespace App\Livewire\Applicant\TabContents;

use Livewire\Component;

class Volunteer extends Component
{

    public $volunteerWorks = [];
    public $applicantId, $vacancyId;


    public function mount()
    {
        // Fetch applicant and vacancy info
        $this->applicantId = \App\Services\Queries\QueryService::findApplicantByUserId(\Auth::id());
        $this->vacancyId = session('applicantChosenVacancy');
        $this->getApplicantVoluntaryWork();
    }

    public function getApplicantVoluntaryWork()
    {
        // Load existing volunteer works if they exist
        $volunteerWorkData = \DB::table('applicant_volunteer_works')
            ->where('applicant_id', $this->applicantId)
            ->where('vacancy_id', $this->vacancyId)
            ->get();

        if ($volunteerWorkData->isNotEmpty()) {
            $this->volunteerWorks = $volunteerWorkData->map(function ($work) {
                return [
                    'organization' => $work->organization,
                    'from_date' => $work->from_date,
                    'to_date' => $work->to_date,
                    'hours' => $work->hours,
                    'position' => $work->position,
                ];
            })->toArray();
        } else {
            $this->volunteerWorks[] = $this->emptyVolunteerWork();
        }
    }

    public function render()
    {
        return view('livewire.applicant.tab-contents.volunteer');
    }

    public function emptyVolunteerWork()
    {
        return [
            'organization' => '',
            'from_date' => '',
            'to_date' => '',
            'hours' => '',
            'position' => '',
        ];
    }

    public function addVolunteerWork()
    {
        $this->volunteerWorks[] = $this->emptyVolunteerWork();
    }

    public function removeVolunteerWork($index)
    {
        unset($this->volunteerWorks[$index]);
        $this->volunteerWorks = array_values($this->volunteerWorks);
    }

    public function save()
    {
//        $this->validate([
//            'volunteerWorks.*.organization' => 'required|string|max:255',
//            'volunteerWorks.*.from_date' => 'required|date',
//            'volunteerWorks.*.to_date' => 'nullable|date|after_or_equal:volunteerWorks.*.from_date',
//            'volunteerWorks.*.hours' => 'nullable|numeric|min:0',
//            'volunteerWorks.*.position' => 'nullable|string|max:255',
//        ]);

        try {
            \DB::beginTransaction();

            // Delete old volunteer work entries for this applicant and vacancy
            \DB::table('applicant_volunteer_works')
                ->where('applicant_id', $this->applicantId)
                ->where('vacancy_id', $this->vacancyId)
                ->delete();

            // Insert updated volunteer work entries
            foreach ($this->volunteerWorks as $work) {
                \DB::table('applicant_volunteer_works')->insert([
                    'applicant_id' => $this->applicantId,
                    'vacancy_id' => $this->vacancyId,
                    'organization' => $work['organization'],
                    'from_date' => $work['from_date'],
                    'to_date' => $work['to_date'],
                    'hours' => $work['hours'],
                    'position' => $work['position'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            \DB::commit();

            session()->flash('message', 'Volunteer work saved successfully.');
        } catch (\Exception $e) {
            \DB::rollBack();

            session()->flash('error', 'An error occurred while saving volunteer work.');
            \Log::error($e->getMessage());
        }
    }

}
