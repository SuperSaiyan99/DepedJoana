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
        Schema::create('applicant_work_experiences', function (Blueprint $table) {
            $table->id();

            $table->string('job_titles');
            $table->string('company');
            $table->string('government_service')->nullable();
            $table->integer('salary_grade')->nullable();
            $table->integer('salary_step')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('current_role')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();


            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_work_experiences');
    }
};
