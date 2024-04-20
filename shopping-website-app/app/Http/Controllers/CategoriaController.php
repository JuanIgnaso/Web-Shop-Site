<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Lista de Categorías';
        $categorias = Categoria::get();
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
                'nombre' => ['required', 'unique:categorias,nombre'],
                'categoriaPadre' => ['exists:categorias,id', 'nullable']
            ]
        );
        //Crear nuevo registro
        $categoria = Categoria::create($data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
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
