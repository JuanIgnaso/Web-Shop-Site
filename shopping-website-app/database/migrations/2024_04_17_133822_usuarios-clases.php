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
        Schema::create('claseUsuario', function (Blueprint $table) {
            $table->id();
            $table->string('clase', 50)->unique();
        });

        \DB::table('claseUsuario')->insert(
            [
                ['clase' => 'Miembro'],
                ['clase' => 'Editor'],
                ['clase' => 'Administrador']
            ]
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claseUsuario');
    }
};
