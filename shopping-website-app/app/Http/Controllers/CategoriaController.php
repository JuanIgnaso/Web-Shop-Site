<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Lista de Categorías';
        $categorias = Categoria::paginate(env('PAGINATION_LENGTH'));
        return view('categoria.index', ['titulo' => $titulo, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Crear nueva Categoria';
        $categorias = Categoria::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('categoria.create', ['titulo' => $titulo, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validamos request
        $data = $request->validate(
            [
                'nombre_categoria' => ['required', 'unique:categorias,nombre'],
                'categoriaPadre' => ['exists:categorias,id', 'nullable']
            ]
        );
        //Crear nuevo registro
        $categoria = Categoria::create($data);
        Registro::create(['operacion' => 'Crear nuevo registro', 'tabla' => 'categorias', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('categoria.index')->with('message', 'Se ha creado un nuevo registro.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $titulo = 'Categoria ID:' . $categoria->id;
        return view('categoria.show', ['titulo' => $titulo, 'categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        $titulo = 'Editando categoría';
        return view('categoria.edit', ['titulo' => $titulo, 'categoria' => $categoria, 'categorias' => Categoria::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {

        $data = $request->validate(
            [
                'nombre_categoria' => ['required'],
                Rule::unique('categorias')->ignore($categoria),
                'categoriaPadre' => ['exists:categorias,id', 'nullable']
            ]
        );

        $categoria->update($data);
        return to_route('categoria.show', $categoria)->with('message', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return to_route('categoria.index')->with('message', 'Registro eliminado correctamente');
    }
}
