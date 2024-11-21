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
        #for applicants
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            #applicant code
            $table->string('applicant_code')->unique()->nullable();
            $table->boolean('is_person_with_disability')->default(false);


            #foreign key for Users table
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicant_position_applied', function (Blueprint $table) {
            $table->dropForeign(['applicant_id']);
        });


        Schema::dropIfExists('applicants');
        Schema::dropIfExists('applicant_position_applied');
        Schema::dropIfExists('applicant_checklist_submissions');
    }
};
