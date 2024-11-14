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
        Schema::create('hrmpsb_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->enum('questionnaire_type', ['co_ioaf'])->default('co_ioaf');
            $table->integer('points')->nullable()->default(0);
            $table->timestamps();
        });

        Schema::create('applicant_inter_observer_agreement_form', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('hrmpsb_questionnaires')->onDelete('cascade');
            // Custom shorter foreign key name
            $table->foreignId('selection_board_id')->constrained('selection_board')
                ->onDelete('cascade')
                ->name('aioaf_selection_board_id_fk');
            $table->integer('rating')->nullable()->default(0);
            $table->timestamps();
        });

        Schema::create('applicant_observer_notes_form', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('hrmpsb_questionnaires')->onDelete('cascade');
            // Custom shorter foreign key name
            $table->foreignId('selection_board_id')->constrained('selection_board')
                ->onDelete('cascade')
                ->name('aonf_selection_board_id_fk');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('applicant_rating_sheet_form', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained('vacancies')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('hrmpsb_questionnaires')->onDelete('cascade');
            // Custom shorter foreign key name
            $table->foreignId('selection_board_id')->constrained('selection_board')
                ->onDelete('cascade')
                ->name('arsf_selection_board_id_fk'); // Shortened FK name
            $table->integer('rating')->nullable()->default(0);
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('classroom_observation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inter_observer_id')->constrained('applicant_inter_observer_agreement_form')->onDelete('cascade');
            $table->foreignId('observer_notes_id')->constrained('applicant_observer_notes_form')->onDelete('cascade');
            $table->foreignId('rating_sheet_id')->constrained('applicant_rating_sheet_form')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('applicant_inter_observer_agreement_form', function (Blueprint $table) {
            $table->dropForeign('aioaf_selection_board_id_fk');
            $table->dropForeign(['applicant_id']);
            $table->dropForeign(['vacancy_id']);
            $table->dropForeign(['question_id']);
        });

        Schema::table('applicant_observer_notes_form', function (Blueprint $table) {
            $table->dropForeign('aonf_selection_board_id_fk');
            $table->dropForeign(['applicant_id']);
            $table->dropForeign(['vacancy_id']);
            $table->dropForeign(['question_id']);
        });

        Schema::table('applicant_rating_sheet_form', function (Blueprint $table) {
            $table->dropForeign('arsf_selection_board_id_fk');
            $table->dropForeign(['applicant_id']);
            $table->dropForeign(['vacancy_id']);
            $table->dropForeign(['question_id']);
        });

        Schema::table('classroom_observation', function (Blueprint $table) {
            $table->dropForeign(['inter_observer_id']);
            $table->dropForeign(['observer_notes_id']);
            $table->dropForeign(['rating_sheet_id']);
        });

        Schema::dropIfExists('hrmpsb_questionnaires');
        Schema::dropIfExists('applicant_inter_observer_agreement_form');
        Schema::dropIfExists('applicant_observer_notes_form');
        Schema::dropIfExists('applicant_rating_sheet_form');
        Schema::dropIfExists('classroom_observation');
    }

};
