<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Productos Index';
        $productos = Producto::query()->leftJoin('proveedores', 'productos.proveedor', '=', 'productos.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->orderBy('created_at', 'desc')->get(['productos.*', 'categorias.nombre_categoria', 'proveedores.nombre_proveedor']);
        return view('producto.index', ['titulo' => $titulo, 'productos' => $productos]);
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
                'categoria' => ['required', 'exists:categorias,id'],
                'proveedor' => ['required', 'exists:proveedores,id'],
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
        $titulo = 'Detalles del producto ID - ' . $producto->id;
        return view('producto.show', ['titulo' => $titulo, 'producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $titulo = 'Editar producto';
        $categorias = Categoria::get();
        $proveedores = Proveedor::get();
        return view('producto.edit', ['producto' => $producto, 'titulo' => $titulo, 'categorias' => $categorias, 'proveedores' => $proveedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate(
            [
                'nombreProducto' => [
                    'required',
                    Rule::unique('productos', 'nombreProducto')->ignore($producto),
                ],
                'categoria' => ['required', 'exists:categorias,id'],
                'proveedor' => ['required', 'exists:proveedores,id'],
                'unidades' => ['required', 'numeric', 'min:0'],
                'precio' => ['required', 'numeric', 'min:0'],
                'descripcion' => ['nullable', 'max:5000']
            ]
        );
        $producto->update($data);
        return to_route('producto.show', $producto)->with('message', 'Cambios realizados con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return to_route('producto.index')->with('message', 'Registro eliminado correctamente');

    }
}
