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

        Schema::create('applicant_increments_score', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');


            $table->string('training_criteria_description', 255);
            $table->integer('training_increment_level');
            $table->enum('training_criteria_status', ['qualified', 'disqualified'])->nullable();


            $table->string('education_criteria_description', 255);
            $table->integer('education_increment_level');
            $table->enum('education_criteria_status', ['qualified', 'disqualified'])->nullable();


            $table->string('experience_criteria_description', 255);
            $table->integer('experience_increment_level');
            $table->enum('experience_criteria_status', ['qualified', 'disqualified'])->nullable();

            $table->enum('overall_remarks_status', ['qualified', 'disqualified'])->nullable();

            $table->foreignId('management_officer_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();

        });

        Schema::create('initial_evaluation_results', function (Blueprint $table) {

            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');

            $table->foreignId('applicant_position_applied_id')->constrained('applicant_position_applied')->onDelete('cascade');

            $table->foreignId('applicant_increments_score_id')->constrained('applicant_increments_score')->onDelete('cascade');

            $table->enum('remarks', ['qualified', 'disqualified'])->nullable();

            $table->timestamps();

        });


        #Score of Assessments
        Schema::create('comparative_assessment_result', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->integer('education')->default(0);
            $table->integer('training')->default(0);
            $table->integer('experience')->default(0);
            $table->decimal('pbet_let', 8, 3)->default(0.000);
            $table->decimal('ppst_cois_classroom', 8, 3)->default(0.000);
            $table->decimal('ppst_ncois_teacher', 8, 3)->default(0.000);
            $table->decimal('total', 8, 3)->default(0.000);
            $table->integer('rank')->nullable();
            $table->string('district')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_increments_score', function (Blueprint $table) {
            $table->dropForeign(['initial_evaluation_results_applicant_increments_score_id_']);
            $table->dropColumn('initial_evaluation_results_applicant_increments_score_id_');
        });

        Schema::dropIfExists('applicant_increments_score');
        Schema::dropIfExists('initial_evaluation_results');
        Schema::dropIfExists('comparative_assessment_result');
    }
};
