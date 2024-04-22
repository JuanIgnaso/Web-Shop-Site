<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $name = Auth::user()->name ?? '';
    return view('dashboard', ['name' => $name]);
})->name('dashboard');

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    /*
    Route::resource crea 7 rutas para manejar el controler:
    note.index(get),note.create(get),note.store(post),note.show(get),note.edit(get),note.update(put),note.destroy(delete)
    */
    Route::resource('proveedor', ProveedorController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
});

//Dashboard Panel de Control
Route::get('/panelcontrol', [DashbordController::class, 'index'])->name('panel.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
