<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Visualizar tabla de regitros
     */

    public function index()
    {
        $titulo = 'Movimientos de la base de datos';
        $registros = new Registro();

        return view('registro.index', [
            'registros' => $registros->getAllRecords(),
            'titulo' => $titulo
        ]);
    }
}
