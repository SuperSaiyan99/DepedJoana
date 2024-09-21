<?php

namespace Database\Factories\Manage;

use App\Models\Manage\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manage\JobPosting>
 */
class JobPostingFactory extends Factory
{
    protected $model = JobPosting::class; // Ensure this points to the right model


    public function definition(): array
    {
        return [
            'position_title' => $this->faker->jobTitle,
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
        ];
    }
}
