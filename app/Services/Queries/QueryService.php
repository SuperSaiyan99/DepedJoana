<?php

namespace App\Services\Queries;

use App\Models\Applicants\Applicant;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QueryService
{

    public static function fetch_applicant_information_by_vacancy_and_applicantCode($vacancy_code, $applicant_code)
    {
        $applicant = DB::table('applicants')
            ->join('applicant_status', 'applicants.id', '=', 'applicant_status.applicant_id')
            ->join('applicant_personal_information', 'applicants.id', '=', 'applicant_personal_information.applicant_id')
            ->join('applicant_residential_address', 'applicants.id', '=', 'applicant_residential_address.applicant_id')
            ->join('applicant_permanent_address', 'applicants.id', '=', 'applicant_permanent_address.applicant_id')
            ->join('applicant_contact_information', 'applicants.id', '=', 'applicant_contact_information.applicant_id')
            ->join('vacancies', 'applicant_status.vacancy_id', '=', 'vacancies.id')
            ->where('applicants.applicant_code', $applicant_code)
            ->select([
                'applicants.*',
                'vacancies.*',
                'applicant_personal_information.*',
                'applicant_residential_address.*',
                'applicant_permanent_address.*',
                'applicant_contact_information.*',
                'applicant_status.*',
            ])
            ->first();

       # dd($applicant); // Check the result

        return $applicant;
    }




    public static function findApplicantByUserId($userId)
    {
        return Applicant::where('user_id', $userId)->value('id');
    }

    public static function updateOrCreate(string $table, array $attributes, array $values = [])
    {
        $record = DB::table($table)->where($attributes)->first();

        if (!$record) {

            $values = array_merge($values, [
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            return DB::table($table)->insert(array_merge($attributes, $values));
        }

        $values = array_merge($values, [
            'updated_at' => Carbon::now()
        ]);

        return DB::table($table)->where($attributes)->update($values);
    }


}
