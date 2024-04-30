<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AccessForbidden;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\EditorAllowed;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $name = Auth::user()->name ?? '';
    return view('dashboard', ['name' => $name]);
})->name('dashboard');

//Contact us
Route::get('/contactar', [HomeController::class, 'contactUs'])->name('contact.index');
Route::post('/contactar', [HomeController::class, 'store'])->name('contact.store');


//Product Listing(provisional)
Route::get('/productos', [ProductoController::class, 'list'])->name('listaProductos');
Route::get('/productos/{id}/details', [ProductoController::class, 'details'])->name('producto.details');


/*
index -> GET
create -> GET
store -> POST
show -> GET
edit -> GET
update -> PUT
destroy -> DELETE
*/


Route::middleware(EditorAllowed::class)->group(function () {
    //Panel de control
    Route::get('/panelcontrol', [DashbordController::class, 'index'])->name('panel.index');

    //Recuros
    Route::resource('/panelcontrol/proveedor', ProveedorController::class);
    Route::resource('/panelcontrol/categoria', CategoriaController::class);
    Route::resource('/panelcontrol/producto', ProductoController::class);
    Route::get('/panelcontrol/registros', [RegistroController::class, 'index'])->name('registros.index');

    //Solo acceso como admin
    Route::resource('/panelcontrol/user', UserController::class)->middleware(AdminAccess::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
