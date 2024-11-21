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

        Schema::create('applicants_uploaded_document', function (Blueprint $table) {
            $table->id();

            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');

            $table->text('file_path')->nullable();
            $table->text('file_name')->nullable();
            $table->text('file_type')->nullable();
            $table->unsignedBigInteger('file_size');
            $table->timestamps();
        });

        Schema::create('applicant_personal_information', function (Blueprint $table) {
            $table->id();

            #foreign key for applicants table
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');

            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated', 'Other']);
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('blood_type', 3)->nullable();
            $table->string('religion')->nullable();
            $table->string('gsis_id_no')->nullable();
            $table->string('pag_ibig_id_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('sss_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('agency_employee_no')->nullable();
            $table->enum('citizenship', ['Filipino', 'Dual Citizenship'])->nullable();
            $table->enum('citizenship_type', ['by birth', 'by naturalization'])->nullable();
            $table->string('country_if_dual_citizenship')->nullable();
            $table->string('ethnicity')->nullable();
            $table->boolean('is_solo_parent')->default(false);



            $table->timestamps();
        });

        Schema::create('applicant_residential_address', function (Blueprint $table) {
            $table->id();

            #foreign key for applicants table
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');


            $table->string('house_number')->nullable();
            $table->string('street');
            $table->string('village');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('zipcode_code', 10);
            $table->timestamps();
        });

        Schema::create('applicant_permanent_address', function (Blueprint $table) {
            $table->id();

            #foreign key for applicants table
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');


            $table->string('house_number')->nullable();
            $table->string('street');
            $table->string('village');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('zipcode_code', 10);
            $table->timestamps();
        });

        Schema::create('applicant_contact_information', function (Blueprint $table) {
            $table->id();

            #foreign key for applicants table
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');


            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants_pds');
        Schema::dropIfExists('applicant_personal_information');
        Schema::dropIfExists('applicant_residential_address');
        Schema::dropIfExists('applicant_permanent_address');
        Schema::dropIfExists('applicant_contact_information');
    }
};
