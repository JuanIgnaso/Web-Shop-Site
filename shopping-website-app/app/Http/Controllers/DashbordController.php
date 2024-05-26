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

    public function home()
    {
        $name = \Auth::user()->name ?? '';
        return view('dashboard', [
            'name' => $name,
            'ultimos' => Producto::select(
                'productos.*',
                \DB::raw('(select imagen from fotosProducto where producto  =   productos.id limit 1) as imagen'),
                \DB::raw('(select avg(puntuacion) from reviews where producto = productos.id) as puntuacion_total')
            )->orderBy('puntuacion_total', 'desc')->limit(8)->get()
        ]);
    }

    function index()
    {
        //Recoger registros de este mes
        $esteMes = Registro::whereBetween('ocurrido_en', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()])->count();

        $data = [
            'productos' => [
                'totales' => Producto::count(),
                'ultimo' => Carbon::parse((Producto::latest()->first())->created_at)->diffForHumans()
            ],
            'categorias' => [
                'totales' => Categoria::count(),
                'ultimo' => Carbon::parse((Categoria::latest()->first())->created_at)->diffForHumans()
            ],
            'proveedores' => [
                'totales' => Proveedor::count(),
                'ultimo' => Carbon::parse((Proveedor::latest()->first())->created_at)->diffForHumans()
            ],
            'usuarios' => [
                'totales' => User::count(),
                'ultimo' => Carbon::parse((User::latest()->first())->created_at)->diffForHumans()
            ],
            'registros' => [
                'ultimos' => Registro::select(['registros.*', 'users.name'])->leftJoin('users', 'registros.usuario', '=', 'users.id')->latest('ocurrido_en')->limit(6)->get(),
                'totalesMes' => $esteMes
            ]

        ];

        return view('panelcontrol', ['data' => $data]);
    }
}
