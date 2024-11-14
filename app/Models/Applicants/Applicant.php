<?php

namespace App\Models\Applicants;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';

    protected $fillable = [
        'user_id',
        'applicant_code'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


#Query For Filter Candidates
public function filterApplicantsByVacancyID($vacancyID)
{
    return DB::table('vacancies')
        ->join('applicants', 'applicants.id', '=', 'vacancies.applicant_id')
        ->where('vacancies.vacancy_id', '=', $vacancyID)
        -get();
}


#Query For Status
    public function ShowReviewedApplicants()
    {
        return DB::table('applicant_status')
            ->join('applicants', 'applicant_status.applicant_id', '=', 'applicants.id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->where('applicant_status.status', 'reviewed')
            ->select('applicants.*', 'applicant_personal_information.*')
            ->get();
    }

    public function ShowSemiApprovedApplicants()
    {
        return DB::table('applicant_status')
            ->join('applicants', 'applicant_status.applicant_id', '=', 'applicants.id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->where('applicant_status.status', 'initial_qualified')
            ->select('applicants.*', 'applicant_personal_information.*')
            ->get();
    }

    public function InitialQualifiedApplicants()
    {
        return DB::table('applicant_status')
            ->join('applicants', 'applicant_status.applicant_id', '=', 'applicants.id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->where('applicant_status.status', 'initial_qualified')
            ->select('applicants.*', 'applicant_personal_information.*')
            ->get();
    }




}
