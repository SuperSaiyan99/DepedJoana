<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'title' => 'Inter Observer Agreement Form',
                'description' => 'Apply knowledge of content within and across curriculum teaching areas.',
                'questionnaire_type' => 'co_ioaf',
                'points' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inter Observer Agreement Form',
                'description' => 'Use a range of teaching strategies that enhance learner achievement in literacy and/or numeracy skills',
                'questionnaire_type' => 'co_ioaf',
                'points' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inter Observer Agreement Form',
                'description' => 'Apply a range of teaching strategies to develop critical and creative thinking, as well as other higher-order skills.',
                'questionnaire_type' => 'co_ioaf',
                'points' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inter Observer Agreement Form',
                'description' => 'Plan, manage and implement developmentally sequenced teaching and learning processes to meet curriculum requirements and varied teaching contexts.',
                'questionnaire_type' => 'co_ioaf',
                'points' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inter Observer Agreement Form',
                'description' => 'Design, select, organize and use diagnostic, formative and summative assessment strategies consistent with curriculum requirements.',
                'questionnaire_type' => 'co_ioaf',
                'points' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($questions as $question) {
            $question['created_at'] = Carbon::now();
            $question['updated_at'] = Carbon::now();
        }

        DB::table('hrmpsb_questionnaires')->insert($questions);
    }

}
