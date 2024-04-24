<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AccessForbidden;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $name = Auth::user()->name ?? '';
    return view('dashboard', ['name' => $name]);
})->name('dashboard');


//Restricción provisional, lanza un 403 si no estás logueado
Route::middleware(AccessForbidden::class)->group(function () {
    /*
    index(get),create(get),store(post),show(get),edit(get),update(put),destroy(delete)
    */
    Route::get('/panelcontrol', [DashbordController::class, 'index'])->name('panel.index');
    Route::resource('/panelcontrol/proveedor', ProveedorController::class);
    Route::resource('/panelcontrol/categoria', CategoriaController::class);
    Route::resource('/panelcontrol/producto', ProductoController::class);
    Route::get('/panelcontrol/registros', [RegistroController::class, 'index'])->name('registros.index');
    Route::resource('/panelcontrol/user', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
