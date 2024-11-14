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
        #for applicant status
        Schema::create('applicant_status', function (Blueprint $table) {
            $table->id();

            #foreign key for Users table
            $table->foreignId('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');


            $table->enum('status', ['reviewed', 'initial_qualified', 'approved', 'rejected'])->default('reviewed');
            $table->longText('reason')->nullable();
            $table->timestamps();
        });

        
        #for applicant interview
        Schema::create('applicant_interview_status', function (Blueprint $table) {
            $table->id();

            #foreign key for Users table
            $table->foreignId('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');


            $table->dateTime('interview_date')->nullable();
            $table->enum('status', ['scheduled', 'completed', 'canceled'])->default('scheduled');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_status');
        Schema::dropIfExists('applicant_interview_status');
    }
};
