<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * For reference, hrmo_qs_evaluation_rubrics is for the Weight allocation
     * For Education, training and experience
     */
    public function up(): void
    {
        Schema::create('hrmo_qs_evaluation_rubrics', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->integer('min_increment');
            $table->integer('max_increment')->nullable();
            $table->integer('points');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrmo_qs_evaluation_rubrics');
    }
};
