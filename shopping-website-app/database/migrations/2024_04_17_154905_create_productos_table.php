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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProducto')->unique();
            $table->text('descripcion')->default('Sin descripción');
            $table->foreignId('categoria')->constrained('categorias');
            $table->foreignId('proveedor')->constrained('proveedores');
            $table->double('precio');
            $table->integer('unidades')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
