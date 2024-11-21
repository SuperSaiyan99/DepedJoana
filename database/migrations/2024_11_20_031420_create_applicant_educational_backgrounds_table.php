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
        Schema::create('applicant_educational_backgrounds', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');

            // Education Levels
            $table->json('elementary')->nullable(); 
            $table->json('secondary')->nullable(); 
            $table->json('vocational')->nullable(); 
            $table->json('college')->nullable(); 
            $table->json('graduate')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_educational_backgrounds');
    }
};
