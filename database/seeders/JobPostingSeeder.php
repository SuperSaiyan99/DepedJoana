<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\HRMO\JobPosting::factory()->count(1)->create();
    }
}
