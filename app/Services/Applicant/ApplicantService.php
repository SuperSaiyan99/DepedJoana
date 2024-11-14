<?php

namespace App\Services\Applicant;

use App\Models\Applicants\Applicant;
use Illuminate\Support\Str;

class ApplicantService
{
    public function createApplicantWithCode($userId)
    {
        $applicant = Applicant::create([
            'user_id' => $userId,
            'applicant_code' => $this->generateUniqueCode(),
        ]);

        return $applicant;
    }

    private function generateUniqueCode()
    {
        do {
            $code = Str::upper(Str::random(8));  // 8-character random code
        } while (Applicant::where('applicant_code', $code)->exists());

        return $code;
    }
}
