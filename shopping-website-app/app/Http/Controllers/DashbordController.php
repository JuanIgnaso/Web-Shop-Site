<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Registro;
use Illuminate\Http\Request;
use App\Models\User;

class DashbordController extends Controller
{
    function index()
    {

        $data = [
            'productos' => Producto::count(),
            'categorias' => Categoria::count(),
            'proveedores' => Proveedor::count(),
            'usuarios' => User::count(),
            'registros' => Registro::orderBy('ocurrido_en', 'desc')->limit(6)->get()
        ];

        return view('panelcontrol', ['data' => $data]);
    }
}
