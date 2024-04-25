<?php

namespace App\Http\Controllers;

use App\Models\ClaseUsuario;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Panel de Usuarios';
        return view('usuario.index', ['titulo' => $titulo, 'usuarios' => User::paginate(env('PAGINATION_LENGTH'))]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $titulo = 'Datos del Usuario';
        return view('usuario.show', ['titulo' => $titulo, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (\Auth::user()->id == $user->id) {
            abort(404);
        }
        $clases = ClaseUsuario::orderBy('id')->get();
        $titulo = 'Editar Usuario';
        return view('usuario.edit', ['clases' => $clases, 'titulo' => $titulo, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
