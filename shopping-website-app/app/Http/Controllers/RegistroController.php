<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use Illuminate\Http\Request;
use App\Models\User;

class RegistroController extends Controller
{
    /**
     * Visualizar tabla de regitros
     */

    public function index(Request $request)
    {
        $titulo = 'Movimientos de la base de datos';
        $registros = new Registro();

        return view('registro.index', [
            'registros' => $this->filter($request),
            'usuarios' => User::select()->orderBy('id', 'desc')->get(),
            'titulo' => $titulo
        ]);
    }

    private function filter(Request $request)
    {
        return Registro::select(['registros.*', 'users.name'])->when(
            isset($request->tabla),
            function ($query) use ($request) {
                return $query->where('tabla', 'LIKE', "%{$request->tabla}%");
            }
        )->when(
                isset($request->usuario),
                function ($query) use ($request) {
                    return $query->whereIn('usuario', $request->usuario);
                }
            )->when(
                isset($request->operacion),
                function ($query) use ($request) {
                    return $query->where('operacion', 'LIKE', "%{$request->operacion}%");
                }
            )->leftJoin('users', 'users.id', '=', 'registros.usuario')->orderBy('id', 'desc')->paginate(env('PAGINATION_LENGTH'));
    }
}
