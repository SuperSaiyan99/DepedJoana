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
        Schema::create('applicant_volunteer_works', function (Blueprint $table) {
            $table->id();
            $table->string('organization', 255);
            $table->date('from_date');
            $table->date('to_date')->nullable();
            $table->integer('hours')->nullable();
            $table->string('position', 255)->nullable();

            // Foreign key constraints
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
        Schema::dropIfExists('applicant_volunteer_works');
    }
};
