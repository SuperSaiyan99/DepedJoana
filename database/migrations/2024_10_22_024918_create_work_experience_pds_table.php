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
        Schema::create('work_experiences_pds', function (Blueprint $table) {
            $table->id();

            // Foreign key to associate with the applicant
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');

            // Work experience details
            $table->date('start_date');  // Start date of the work experience
            $table->date('end_date');  // End date (must be after or equal to the start date)
            $table->string('position');  // Position held during the work experience
            $table->string('office_unit');  // Office or unit where the applicant worked
            $table->string('supervisor');  // Supervisor name
            $table->string('agency');  // Agency or company name
            $table->text('accomplishments')->nullable();  // Accomplishments, optional field
            $table->text('duties');  // Duties and responsibilities in the job

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experience_pds');
    }
};
