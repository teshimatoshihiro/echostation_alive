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
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->boolean('is_requester');
        $table->string('email')->unique();
        $table->string('password');
        $table->json('speciality'); // もしくは $table->text('speciality');
        $table->string('notes', 511)->nullable();
        $table->string('skyway_url')->nullable();
        $table->string('region')->nullable();
        $table->timestamps(); // これが created_at と updated_at を自動的に追加します
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
