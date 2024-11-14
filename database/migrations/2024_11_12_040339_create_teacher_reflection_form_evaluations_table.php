<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nco_objective_questions', function (Blueprint $table) {
            $table->id();
            $table->string('objective_title');
            $table->text('narrative_description');
            $table->timestamps();
        });

        Schema::create('teacher_reflection_form_evaluations', function (Blueprint $table) {
            $table->id();

            // Shortened foreign key constraint name
            $table->foreignId('objective_question_id')
                ->constrained('nco_objective_questions')
                ->onDelete('cascade')
                ->index(); // Optional index for performance

            $table->foreignId('applicant_id')
                ->constrained('applicants')
                ->onDelete('cascade');

            $table->foreignId('vacancy_id')
                ->constrained('vacancies')
                ->onDelete('cascade');

            $table->foreignId('selection_board_id')
                ->constrained('selection_board')
                ->onDelete('cascade');

            $table->text('applicant_reflection_answer');
            $table->text('evaluator_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_reflection_form_evaluations');
        Schema::dropIfExists('nco_objective_questions');
    }
};
