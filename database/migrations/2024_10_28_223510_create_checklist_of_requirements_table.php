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

        Schema::create('checklist_of_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('requirement_title');
            $table->string('requirement_description')->nullable();
            $table->boolean('applicant_submission_status')->default(true);
            $table->boolean('hrmo_submission_status')->default(true);
            $table->boolean('hrmo_remarks')->default(true);
            $table->timestamps();
        });

        Schema::create('applicant_checklist_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('checklist_item_id')->constrained('checklist_of_requirements')->onDelete('cascade');
            $table->boolean('submitted')->default(false);
            $table->boolean('verified')->default(false);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_of_requirements');
        Schema::dropIfExists('applicant_checklist_submissions');
    }
};
