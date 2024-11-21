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
        Schema::create('salary_grade', function (Blueprint $table) {
            $table->id();
            $table->integer('grade_number');
            $table->decimal('step_1')->nullable();
            $table->decimal('step_2')->nullable();
            $table->decimal('step_3')->nullable();
            $table->decimal('step_4')->nullable();
            $table->decimal('step_5')->nullable();
            $table->decimal('step_6')->nullable();
            $table->decimal('step_7')->nullable();
            $table->decimal('step_8')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_grade');
    }
};
