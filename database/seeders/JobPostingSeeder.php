<?php

namespace Database\Seeders;

use App\Models\Manage\JobPosting;
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPosting::factory()->count(50)->create();  // Generates 50 job postings
    }
}
