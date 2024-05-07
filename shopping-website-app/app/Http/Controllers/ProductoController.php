<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use App\Models\Registro;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{

    /**
     * Muestra la lista de productos en la tienda
     */

    public function productCategories()
    {
        $titulo = 'Categorías';
        return view('producto.categories', ['titulo' => $titulo, 'categorias' => Categoria::tree()]);
    }


    public function list($id)
    {
        $titulo = ucfirst(Categoria::find($id)->nombre_categoria);
        return view('producto.lists', [
            'productos' => Producto::select()->where('categoria', '=', $id)->paginate(env('PAGINATION_LENGTH')),
            'titulo' => $titulo,
            'proveedores' => Proveedor::select()->get()
        ]);
    }

    /**
     * Muestra los detalles del producto en el front de la tienda
     */
    public function details($id)
    {
        $titulo = 'Detalles del Producto';
        $reviews = Review::select(['reviews.*', 'users.name', 'users.created_at'])->leftJoin('users', 'reviews.usuario', '=', 'users.id')->where('producto', '=', $id)->orderBy('fecha_review', 'desc')->paginate(env('PAGINATION_LENGTH'));
        return view('producto.details', ['titulo' => $titulo, 'producto' => Producto::select(['productos.*', 'categorias.nombre_categoria', 'proveedores.nombre_proveedor'])->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->find($id), 'reviews' => $reviews]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Productos Index';
        $productos = Producto::select(['productos.*', 'categorias.nombre_categoria', 'proveedores.nombre_proveedor'])->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->orderBy('created_at', 'desc')->paginate(env('PAGINATION_LENGTH'));
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
    public function store(StoreProductoRequest $request)
    {
        //Validar producto
        $data = $request->validated();

        $producto = Producto::create($data);

        Registro::create(['operacion' => 'Crear nuevo registro', 'tabla' => 'productos', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
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
                    Rule::unique('productos', 'nombreProducto')->ignore($producto->id),
                ],
                'categoria' => ['required', 'exists:categorias,id'],
                'proveedor' => ['required', 'exists:proveedores,id'],
                'unidades' => ['required', 'numeric', 'min:0'],
                'precio' => ['required', 'numeric', 'min:0'],
                'descripcion' => ['nullable', 'max:5000']
            ]
        );
        $producto->update($data);
        Registro::create(['operacion' => 'Actualizar registro', 'tabla' => 'productos', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('producto.show', $producto)->with('message', 'Cambios realizados con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        Registro::create(['operacion' => 'Eliminar registro', 'tabla' => 'productos', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('producto.index')->with('message', 'Registro eliminado correctamente');

    }
}
