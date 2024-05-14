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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proveedor')->unique();
            $table->string('direccion')->unique();
            $table->string('email')->unique();
            $table->string('website')->default("Sin datos");
            $table->string('telefono')->default("Sin datos");
            $table->timestamps();
        });

        //Insertar campos de ejemplo
        \DB::table('proveedores')->insert(
            [
                ['nombre_proveedor' => 'Proveedor Prueba', 'direccion' => 'test', 'email' => 'proveedortest@mail.com', 'website' => 'https://testSite.com', 'telefono' => '999999999'],
                ['nombre_proveedor' => 'Proveedor Test', 'direccion' => 'test dos', 'email' => 'proveedorprueba@mail.com', 'website' => 'https://testSite2.com', 'telefono' => '888999999']
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
