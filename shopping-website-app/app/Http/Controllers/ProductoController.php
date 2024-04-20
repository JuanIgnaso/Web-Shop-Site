<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::query()->orderBy('created_at', 'desc')->paginate(30);
        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::get();
        $proveedores = Proveedor::get();
        $titulo = 'Crear Producto';
        return view('producto.create', ['titulo' => $titulo, 'categorias' => $categorias, 'proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'nombreProducto' => ['required', 'unique:productos,nombreProducto'],
                'categoria' => ['required', 'exists:categorias'],
                'proveedor' => ['required', 'exists:proveedores'],
                'unidades' => ['required', 'numeric', 'min:0'],
                'precio' => ['required', 'numeric', 'min:0'],
                'descripcion' => ['nullable', 'max:5000']
            ]
        );

        $producto = Producto::create($data);
        return to_route('producto.index')->with('message', 'Se ha creado un nuevo registro');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
