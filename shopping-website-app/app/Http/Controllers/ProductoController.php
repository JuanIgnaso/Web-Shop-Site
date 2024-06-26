<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\Http\Requests\StoreProductoRequest;
use App\Models\Categoria;
use App\Models\fotosProducto;
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


    public function filterBy(Request $request, $categoria)
    {
        $data = [
            'titulo' => ucfirst(Categoria::find($categoria)->nombre_categoria),
            'proveedores' => Producto::select('productos.proveedor', 'proveedores.id', 'proveedores.nombre_proveedor')->distinct()->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->where('categoria', '=', $categoria)->get(),
            'marcas' => Producto::select(['marca'])->distinct()->where('categoria', '=', $categoria)->get(),
            'categoria' => $categoria,
            //    'productos' => $this->filter($request, ['*'])->where('categoria', '=', $categoria)->paginate(env('PAGINATION_LENGTH'))
            'productos' => $this->filter(
                $request,
                [
                    'productos.*',
                    \DB::raw('(select imagen from fotosProducto where producto  =   productos.id limit 1) as imagen'),
                    \DB::raw('(select avg(puntuacion) from reviews where producto = productos.id) as puntuacion_total')

                ]
            )
                ->where('categoria', '=', $categoria)->paginate(env('PAGINATION_LENGTH'))
        ];

        return view('producto.lists', ['data' => $data]);
    }

    /**
     * Se aplican los filtros para buscar productos
     */
    private function filter($request, $fields)
    {
        return Producto::select($fields)->when($request->val_minimo >= 0 && isset($request->val_minimo), function ($query) use ($request) {
            return $query->where('precio', '>=', $request->val_minimo);
        })->when($request->val_maximo >= $request->val_minimo && isset($request->val_maximo), function ($query) use ($request) {
            return $query->where('precio', '<=', $request->val_maximo);
        })->when(isset($request->proveedor), function ($query) use ($request) {
            return $query->whereIn('proveedor', $request->proveedor);
        })->when(isset($request->marca), function ($query) use ($request) {
            return $query->whereIn('marca', $request->marca);
        })->when(isset($request->categoria), function ($query) use ($request) {
            return $query->whereIn('categoria', $request->categoria);
        })->when(isset($request->nombreProducto), function ($query) use ($request) {
            return $query->where('nombreProducto', 'LIKE', "%{$request->nombreProducto}%");
        });
        //AVERIGUADO COMO HACERLO CON CHECKBOXES, FALTARÍA SABER COMO CON SELECT MÚLTIPLES
    }



    /**
     * Muestra los detalles del producto en el front de la tienda
     */
    public function details($producto)
    {
        $producto = Producto::select(['productos.*', \DB::raw('(select imagen from fotosProducto where producto  =   productos.id limit 1) as imagen'), 'categorias.nombre_categoria', 'proveedores.nombre_proveedor', 'proveedores.website'])->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->find($producto);
        $producto->imagen = $producto->imagen == NULL ? \Vite::asset('resources/images/web-logo.png') : url('storage/' . $producto->imagen);
        return view(
            'producto.details',
            [
                'titulo' => 'Detalles del Producto',
                'imagenes' => (fotosProducto::getProductImages($producto->id))->toArray(),
                'producto' => $producto,
                'reviews' => Review::getProductReviews($producto->id)
            ]
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $titulo = 'Productos Index';
        $productos = $this->filter($request, ['productos.*', 'categorias.nombre_categoria', 'proveedores.nombre_proveedor'])->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->orderBy('created_at', 'desc')->paginate(env('PAGINATION_LENGTH'));
        //Producto::select(['productos.*', 'categorias.nombre_categoria', 'proveedores.nombre_proveedor'])->leftJoin('proveedores', 'productos.proveedor', '=', 'proveedores.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->orderBy('created_at', 'desc')->paginate(env('PAGINATION_LENGTH'));
        return view(
            'producto.index',
            [
                'titulo' => $titulo,
                'productos' => $productos,
                'proveedor' => Proveedor::select()->orderBy('id', 'desc')->get(),
                'categoria' => Categoria::select()->orderBy('id', 'desc')->get()
            ]
        );
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
        return to_route('producto.show', $producto)->with('success', 'Se ha creado un nuevo registro');
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
                'marca' => ['required', 'max:50'],
                'precio' => ['required', 'numeric', 'min:0'],
                'descripcion' => ['nullable', 'max:5000']
            ]
        );
        $producto->update($data);
        Registro::create(['operacion' => 'Actualizar registro', 'tabla' => 'productos', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('producto.show', $producto)->with('success', 'Cambios realizados con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        /*
        Para borrar un producto primero borramos las dependencias:
        1º-encontrar todas las fotos y borrarlas junto con los registros de la BBDD
        2º-encontrar y borrar las reviews asociadas al producto
        3º-borrar el producto.
        */

        $fotos = fotosProducto::getProductImages($producto->id);

        //1º
        if (count($fotos) != 0) {
            foreach ($fotos as $foto) {
                FileManager::deleteFile('public', 'images/product_id_' . $producto->id, $foto->imagen);
                $foto->delete();
            }
        }

        //2º
        Review::where('producto', '=', $producto->id)->delete();

        //3º
        $producto->delete();

        Registro::create(['operacion' => 'Eliminar registro', 'tabla' => 'productos', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('producto.index')->with('success', 'Registro eliminado correctamente');
    }
}
