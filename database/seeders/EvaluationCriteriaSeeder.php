<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            ['category' => 'Education', 'min_increment' => 10, 'max_increment' => null, 'points' => 10],
            ['category' => 'Education', 'min_increment' => 8, 'max_increment' => 9, 'points' => 8],
            ['category' => 'Education', 'min_increment' => 6, 'max_increment' => 7, 'points' => 6],
            ['category' => 'Education', 'min_increment' => 4, 'max_increment' => 5, 'points' => 4],
            ['category' => 'Education', 'min_increment' => 2, 'max_increment' => 3, 'points' => 2],

            ['category' => 'Training', 'min_increment' => 10, 'max_increment' => null, 'points' => 10],
            ['category' => 'Training', 'min_increment' => 8, 'max_increment' => 9, 'points' => 8],
            ['category' => 'Training', 'min_increment' => 6, 'max_increment' => 7, 'points' => 6],
            ['category' => 'Training', 'min_increment' => 4, 'max_increment' => 5, 'points' => 4],
            ['category' => 'Training', 'min_increment' => 2, 'max_increment' => 3, 'points' => 2],

            ['category' => 'Experience', 'min_increment' => 10, 'max_increment' => null, 'points' => 10],
            ['category' => 'Experience', 'min_increment' => 8, 'max_increment' => 9, 'points' => 8],
            ['category' => 'Experience', 'min_increment' => 6, 'max_increment' => 7, 'points' => 6],
            ['category' => 'Experience', 'min_increment' => 4, 'max_increment' => 5, 'points' => 4],
            ['category' => 'Experience', 'min_increment' => 2, 'max_increment' => 3, 'points' => 2],
        ];

        DB::table('hrmo_qs_evaluation_rubrics')->insert($criteria);
    }
}
