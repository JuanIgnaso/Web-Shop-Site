<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('cabecera');
            $table->text('review');
            $table->foreignId('producto')->constrained('productos');
            $table->foreignId('usuario')->constrained('users');
            $table->tinyInteger('recomendado');
            $table->integer('puntuacion');
            $table->timestamp('fecha_review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
