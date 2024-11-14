<?php

namespace App\Models\HRMO;

use Database\Factories\JobPostingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    protected $fillable = [
        'position_title',
        'education',
        'training',
        'experience',
        'eligibility',
        'plantilla_number',  // JSON
        'salary_grade',
        'monthly_salary',
        'number_of_vacancy',
        'is_vacancy_shs',
        'subject',           // JSON
        'track',
        'strand',
        'place_of_assignment', // JSON
        'job_summary',
        'status'
    ];

    protected $casts = [
        'is_vacancy_shs' => 'bool',
    ];

    protected static function factory()
    {
        return JobPostingFactory::new();
    }
}
