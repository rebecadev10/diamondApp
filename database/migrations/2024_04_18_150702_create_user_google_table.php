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
        Schema::create('user_google', function (Blueprint $table) {
            $table->id();
            $table->foreignId('google_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('google_token')->nullable();
            $table->string('google_refresh_token')->nullable();
            $table->string('google_profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_google');
    }
};
