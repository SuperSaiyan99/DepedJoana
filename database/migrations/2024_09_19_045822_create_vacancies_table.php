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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            #$table->foreignId('id')->references('id')->on('user')->onDelete('cascade');
            $table->string('position_title');
            $table->string('education');
            $table->string('training');
            $table->string('experience');
            $table->string('eligibility');
            $table->json('plantilla_number');
            $table->string('salary_grade');
            $table->string('monthly_salary');
            $table->string('number_of_vacancy');
            $table->boolean('is_vacancy_shs');
            $table->json('subject');
            $table->string('track');
            $table->string('strand');
            $table->json('place_of_assignment');
            $table->string('job_summary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
