<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class DashbordController extends Controller
{
    function index()
    {
        //Recoger registros de este mes
        $esteMes = Registro::whereBetween('ocurrido_en', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->count();

        $data = [
            'productos' => Producto::count(),
            'categorias' => Categoria::count(),
            'proveedores' => Proveedor::count(),
            'usuarios' => User::count(),
            'registros' => [
                'ultimos' => Registro::orderBy('ocurrido_en', 'desc')->limit(6)->get(),
                'totalesMes' => $esteMes
            ]

        ];

        return view('panelcontrol', ['data' => $data]);
    }
}
