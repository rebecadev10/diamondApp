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
        Schema::create('planificacions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_red_social');
            $table->text('descripcion');
            $table->date('date_public_facebook');
            $table->time('time_public_facebook');
            $table->date('date_public_instagram');
            $table->time('time_public_instagram');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planificacions');
    }
};
