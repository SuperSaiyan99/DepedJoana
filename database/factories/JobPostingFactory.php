<?php

namespace Database\Factories;

use App\Models\HRMO\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class JobPostingFactory extends Factory
{
    protected $model = JobPosting::class;


    public function definition(): array
    {
        //todo: change it paghuman sa defense
        $jobTitleTable = DB::table('job_titles');
        #$jobVacancyTable = DB::table('vacancies');

        $jobTitle = $jobTitleTable->inRandomOrder()->value('description');
        #$jobSchool_level = $jobVacancyTable->inRandomOrder()->value('school_level');

        return [
            'vacancy_type' => 'teaching',
            'school_level' =>  $this->faker->randomElement(['kindergarten', 'elementary', 'junior_high_school', 'senior_high_school']),
            'position_title' => 'Teacher I',
            'education' => $this->faker->randomElement(['Bachelor’s Degree', 'Master’s Degree', 'PhD']),
            'training' => $this->faker->sentence(3),
            'experience' => $this->faker->sentence(3),
            'eligibility' => $this->faker->sentence(3),
            'plantilla_number' => json_encode([$this->faker->unique()->randomNumber()]),
            'salary_grade' => $this->faker->randomElement(['SG 18', 'SG 19', 'SG 20']),
            'monthly_salary' => $this->faker->randomNumber(5),
            'number_of_vacancy' => $this->faker->randomDigitNotNull,
            'is_vacancy_shs' => $this->faker->boolean,
            'subject' => json_encode([$this->faker->word, $this->faker->word]),
            'track' => $this->faker->word,
            'strand' => $this->faker->word,
            'place_of_assignment' => json_encode([$this->faker->city, $this->faker->city]),
            'job_summary' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
