<?php

namespace App\Http\Controllers;

use App\Models\ClaseUsuario;
use App\Models\Registro;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $titulo = 'Panel de Usuarios';
        return view('usuario.index', [
            'titulo' => $titulo,
            'usuarios' => $this->filter($request, ['users.*', 'claseUsuario.clase'])->leftJoin('claseUsuario', 'claseUsuario.id', '=', 'users.claseUsuario')->paginate(env('PAGINATION_LENGTH')),
            'clases' => ClaseUsuario::query()->orderBy('id', 'desc')->get()
        ]);
    }


    //Filtrar
    private function filter(Request $request, $fields)
    {
        return User::select($fields)->when(isset($request->name), function ($query) use ($request) {
            return $query->where('name', 'LIKE', "%{$request->name}%");
        })->when(
                isset($request->email),
                function ($query) use ($request) {
                    return $query->where('email', 'LIKE', "%{$request->email}%");
                }
            )->when(isset($request->clase), function ($query) use ($request) {
                return $query->whereIn('claseUsuario', $request->clase);
            });
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
        $data = $request->validate(
            [
                'name' => ['required', Rule::unique('users', 'name')->ignore($user->id)],
                'email' => ['required', Rule::unique('users', 'email')->ignore($user->id), 'email'],
                'claseUsuario' => ['required', 'exists:claseUsuario,id']
            ]
        );
        $user->update($data);
        Registro::create(['operacion' => 'Actualizar registro', 'tabla' => 'users', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('user.index')->with('success', 'Información del usuario actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Desactivar o activar usuario
     */
    public function toggle($id)
    {
        User::find($id)->toggleUser();
        return to_route('user.index')->with('info', 'Usuario actualizado');
    }
}
