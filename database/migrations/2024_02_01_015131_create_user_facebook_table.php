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
        Schema::create('users_facebook', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facebook_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            // $table->string('tokenFacebook');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_facebook');
    }
};
