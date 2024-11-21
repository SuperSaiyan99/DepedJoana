<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->text('vacancy_code');
            $table->enum('vacancy_type', ['teaching', 'non-teaching']);
            $table->enum('school_level', ['kindergarten', 'elementary', 'junior_high_school', 'senior_high_school']);
            $table->string('position_title');
            $table->string('education');
            $table->string('training');
            $table->string('experience');
            $table->string('eligibility');
            $table->json('plantilla_number');
            $table->string('salary_grade');
            $table->string('monthly_salary');
            $table->integer('number_of_vacancy');
            $table->boolean('is_vacancy_shs');
            $table->json('subject');
            $table->string('track');
            $table->string('strand');
            $table->json('place_of_assignment');
            $table->longText('job_summary');
            $table->enum('status', ['Active', 'On_going', 'Inactive', 'For_interview'])->default('Active');
            $table->dateTime('close_date')->nullable();
            $table->timestamps();
        });

        Schema::create('increments_table', function (Blueprint $table) {
            $table->id();
            $table->integer('level_increments')->nullable(false);
            $table->string('from_description')->nullable(false);
            $table->string('to_description')->nullable(false);
            $table->enum('increments_type', ['education', 'training', 'experience']);
            $table->timestamps();
        });

        #for applicant position applied
        Schema::create('applicant_position_applied', function (Blueprint $table) {
            $table->id();

            #elements
            $table->string('school_district');
            $table->enum('status', ['visitor', 'applied']);

            #foreign key for Users table
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
        Schema::dropIfExists('increments_table');
        Schema::dropIfExists('applicant_position_applied');
    }
};
