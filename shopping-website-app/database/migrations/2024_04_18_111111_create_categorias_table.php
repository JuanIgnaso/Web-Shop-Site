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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_categoria')->unique();
            $table->foreignId('categoriaPadre')->nullable()->constrained('categorias');
            $table->timestamps();
        });

        \DB::table('categorias')->insert(
            [
                ['nombre_categoria' => 'Sin Categoria', 'categoriaPadre' => NULL],
                ['nombre_categoria' => 'test', 'categoriaPadre' => 1]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
