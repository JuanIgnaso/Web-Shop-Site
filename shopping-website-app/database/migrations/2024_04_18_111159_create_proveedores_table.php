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
            $table->string('nombre')->unique();
            $table->string('direccion')->unique();
            $table->string('email')->unique();
            $table->string('website')->nullable()->default('Sin datos');
            $table->string('telefono')->nullable()->default('Sin datos');
            $table->timestamps();
        });

        \DB::table('proveedores')->insert(
            [
                ['nombre' => 'Proveedor Prueba', 'direccion' => 'test', 'email' => 'proveedortest@mail.com', 'website' => 'https://testSite.com', 'telefono' => '999999999'],
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
