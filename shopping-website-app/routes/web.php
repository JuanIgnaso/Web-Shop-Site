<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AccessForbidden;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\EditorAllowed;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashbordController::class, 'home'])->name('dashboard');




//Contact us
Route::get('/contactar', [HomeController::class, 'contactUs'])->name('contact.index');
Route::post('/contactar', [HomeController::class, 'store'])->name('contact.store');


//Listar Productos
Route::get('/productos/{id}/list', [ProductoController::class, 'filterBy'])->name('producto.list');
Route::get('/productos/{id}/details', [ProductoController::class, 'details'])->name('producto.details');
Route::get('/productos/categorias', [ProductoController::class, 'productCategories'])->name('producto.categorias');


//Acciones que requiren ser un USUARIO REGISTRADO
Route::middleware(AccessForbidden::class)->group(function () {
    //Review
    Route::post('/review/{id}/create', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::get('/checkout', function () {
        return view('checkout.checkout', ['titulo' => 'Finalizar Compra']);
    })->name('checkout.index');

    //Carrito TEST TEMPORAL
    Route::get('/ajaxResponse', [OrderController::class, 'cfgetData']);
    Route::get('/addToCart', [OrderController::class, 'addToCart']);
    Route::get('/removeFromCart', [OrderController::class, 'removeFromCart']);
    Route::get('/getUserCart', [OrderController::class, 'getUserCart']);
    /*
    /addToCart
    /removeFromCart
    /getUserCart
    */

    //Checkout
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});


//cheats para saber que métodos usar -> methods_cheats.txt

#PANEL DE CONTROL - Restringido a usuarios editores y administradores
Route::middleware(EditorAllowed::class)->group(function () {
    Route::get('/panelcontrol', [DashbordController::class, 'index'])->name('panel.index');

    //Recursos
    Route::resource('/panelcontrol/proveedor', ProveedorController::class);
    Route::resource('/panelcontrol/categoria', CategoriaController::class);
    Route::resource('/panelcontrol/producto', ProductoController::class);
    Route::get('/panelcontrol/registros', [RegistroController::class, 'index'])->name('registros.index');

    //Control de imagenes
    Route::get('panelcontrol/fotos', [FileController::class, 'index'])->name('files.index');
    Route::put('panelcontrol/fotos', [FileController::class, 'store'])->name('files.store');
    Route::delete('panelcontrol/fotos/{id}', [FileController::class, 'destroy'])->name('files.destroy');
});

//Acceso restringido a solo Admin
Route::middleware(AdminAccess::class)->group(function () {
    //Usuarios
    Route::resource('/panelcontrol/user', UserController::class);
    Route::put('/panelcontrol/user/toggle/{id}', [UserController::class, 'toggle'])->name('user.toggle');
    //Reviews
    Route::get('/panelcontrol/review', [ReviewController::class, 'index'])->name('review.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
