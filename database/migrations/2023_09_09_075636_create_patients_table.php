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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('part');
            $table->string('request_status')->nullable();
            $table->timestamps();
            $table->unsignedInteger('age')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('chief_complaint')->nullable();
            $table->string('medical_history')->nullable();
            $table->string('vitals')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
