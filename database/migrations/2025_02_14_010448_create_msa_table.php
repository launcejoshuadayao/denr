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
        Schema::create('msa', function (Blueprint $table) {
            $table->increment('id');
            $table->string('applicant_name');
            $table->string('applicant_num');
            $table->string('patented_subsisting');
            $table->string('location');
            $table->string('survey_no');
            $table->string('remarks');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('msa');
    }
};
