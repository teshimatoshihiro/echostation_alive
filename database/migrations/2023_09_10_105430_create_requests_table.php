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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->text('request_message')->nullable();
            $table->boolean('request_status')->nullable();
            $table->timestamps();
            $table->foreignId('requester_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('contractor_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('patient_id')->constrained('patients', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
