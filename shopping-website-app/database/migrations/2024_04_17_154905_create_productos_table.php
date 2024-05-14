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
            $table->text('descripcion')->default(null);
            $table->foreignId('categoria')->constrained('categorias');
            $table->foreignId('proveedor')->constrained('proveedores');
            $table->string('marca')->default(NULL);
            $table->double('precio');
            $table->integer('unidades')->default(0);
            $table->timestamps();
        });

        //Insertar campos de ejemplo tenemos 2 proveedores, 3 categorias
        \DB::table('productos')->insert(
            [
                ['nombreProducto' => 'Nullam varius', 'descripcion' => 'Integer eros dolor, dapibus vel rutrum et, laoreet id nibh. Nulla accumsan ornare nulla, quis convallis tortor placerat ac. ', 'categoria' => 1, 'proveedor' => 1, 'marca' => 'Marca1', 'precio' => 1.44, 'unidades' => 12],
                ['nombreProducto' => 'Phasellus vehicula', 'descripcion' => ' Pellentesque pharetra in turpis vel vulputate. Nunc eget nunc mi. Pellentesque varius finibus est, sed pharetra justo condimentum ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc est sapien, commodo a neque ac, pellentesque auctor mi. ', 'categoria' => 1, 'proveedor' => 2, 'marca' => 'Marca2', 'precio' => 5.12, 'unidades' => 56],
                ['nombreProducto' => 'Quisque faucibus', 'descripcion' => 'Mauris ullamcorper felis a massa dapibus gravida. Suspendisse potenti. Integer a metus et nibh dignissim commodo sed et lorem. In auctor hendrerit erat, vehicula posuere augue accumsan ac. Pellentesque ac mauris rhoncus, tristique lacus eget, scelerisque arcu. Nam ac massa eu purus commodo luctus ac sagittis risus. ', 'categoria' => 1, 'proveedor' => 1, 'marca' => 'Marca3', 'precio' => 11.76, 'unidades' => 7],
                ['nombreProducto' => 'Cras vel mi ultrices', 'descripcion' => 'ed ornare, ex id rutrum ornare, enim nulla dignissim sapien, porta vulputate metus lectus ac metus. Nullam varius sit amet enim et semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus.', 'categoria' => 2, 'proveedor' => 1, 'marca' => 'Marca1', 'precio' => 0.64, 'unidades' => 89],
                ['nombreProducto' => 'Nam euismod', 'descripcion' => 'Donec condimentum suscipit magna ut bibendum. Fusce elementum consequat tortor vel molestie. Cras vel mi ultrices, viverra diam vitae, maximus est. Nulla finibus accumsan justo eu scelerisque. Nulla id turpis mollis, vulputate ipsum in, ullamcorper purus.', 'categoria' => 2, 'proveedor' => 2, 'marca' => 'Marca2', 'precio' => 53.22, 'unidades' => 43],
                ['nombreProducto' => 'Vivamus sit amet', 'descripcion' => 'Pellentesque vel aliquet erat. Cras et mollis lacus, sit amet cursus enim. Pellentesque ut nunc egestas, rutrum erat eu, condimentum libero. Quisque cursus tincidunt magna. Sed eros felis, congue at dolor eu, maximus auctor risus. Nam facilisis quis mauris vitae mattis. ', 'categoria' => 2, 'proveedor' => 1, 'marca' => 'Marca3', 'precio' => 9.98, 'unidades' => 90]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
