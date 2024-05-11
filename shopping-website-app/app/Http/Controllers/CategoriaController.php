<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Categoria;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $titulo = 'Lista de Categorías';
        $categorias = $this->filter($request);
        return view('categoria.index', ['titulo' => $titulo, 'categorias' => $categorias, 'categoriaPadre' => Categoria::select()->get()]);
    }

    private function filter($request)
    {
        return Categoria::select()->when(
            isset($request->nombre_categoria),
            function ($query) use ($request) {
                return $query->where('nombre_categoria', 'LIKE', "%{$request->nombre_categoria}%");
            }
        )->when(
                isset($request->categoriaPadre),
                function ($query) use ($request) {
                    return $query->whereIn('categoriaPadre', $request->categoriaPadre);
                }
            )->paginate(env('PAGINATION_LENGTH'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Crear nueva Categoria';
        $categorias = Categoria::query()->orderBy('created_at', 'desc')->get();
        return view('categoria.create', ['titulo' => $titulo, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        //validamos request
        $data = $request->validated();

        //Crear nuevo registro
        $categoria = Categoria::create($data);
        Registro::create(['operacion' => 'Crear nuevo registro', 'tabla' => 'categorias', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('categoria.show', $categoria->id)->with('message', 'Se ha creado un nuevo registro.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $titulo = 'Categoria ID:' . Categoria::find($id)->id;
        return view('categoria.show', ['titulo' => $titulo, 'categoria' => Categoria::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $titulo = 'Editando categoría';
        return view('categoria.edit', ['titulo' => $titulo, 'categoria' => Categoria::find($id), 'categorias' => Categoria::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $categoria = Categoria::find($id);
        $data = $request->validate(
            [
                'nombre_categoria' => ['required'],
                Rule::unique('categorias')->ignore($categoria),
                'categoriaPadre' => ['exists:categorias,id', 'nullable']
            ]
        );

        $categoria->update($data);
        Registro::create(['operacion' => 'Modificar registro', 'tabla' => 'categorias', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('categoria.show', $categoria->id)->with('message', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (Categoria::hasDependencies($id)) {
                return to_route('categoria.index')->with('error', 'No se puede borrar esta Categoría porque otras Categorías dependen de ella.');
            }
            if (Producto::getByCategory($id)->count() != 0) {
                return to_route('categoria.index')->with('error', 'Hay productos que dependen de esta Categoría.');
            }
            Categoria::find($id)->delete();
            $insert = Registro::create(['operacion' => 'Eliminar registro', 'tabla' => 'categorias', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
            return to_route('categoria.index')->with('message', 'Registro eliminado correctamente');
        } catch (\Error $e) {
            return to_route('categoria.index')->with('error', $e->getMessage());
        }

    }
}
