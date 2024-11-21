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
        Schema::create('applicant_pds_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');

            $table->string('q34a')->nullable();
            $table->string('q34aDetails')->nullable();
            $table->string('q34b')->nullable();
            $table->string('q34bDetails')->nullable();
            $table->string('q35a')->nullable();
            $table->string('q35aDetails')->nullable();
            $table->string('q35b')->nullable();
            $table->string('q35bDetails')->nullable();
            $table->date('q35bDateFiled')->nullable();
            $table->string('q35bStatus')->nullable();
            $table->string('q36')->nullable();
            $table->string('q36Details')->nullable();
            $table->string('q37')->nullable();
            $table->string('q37Details')->nullable();
            $table->string('q38a')->nullable();
            $table->string('q38aDetails')->nullable();
            $table->string('q38b')->nullable();
            $table->string('q38bDetails')->nullable();
            $table->string('q39')->nullable();
            $table->string('q39Details')->nullable();
            $table->string('q40a')->nullable();
            $table->string('q40aDetails')->nullable();
            $table->string('q40b')->nullable();
            $table->string('q40bDetails')->nullable();
            $table->string('q40c')->nullable();
            $table->string('q40cDetails')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_pds_questions');
    }
};
