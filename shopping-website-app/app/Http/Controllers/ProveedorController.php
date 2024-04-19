<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('proveedor.index', ['proveedores' => $proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Registrar Nuevo Proveedor';
        return view('proveedor.create', ['titulo' => $titulo]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar request
        $data = $request->validate(
            [
                'nombre' => ['required', 'unique:proveedores,nombre', 'between:2,50'],
                'direccion' => ['required', 'unique:proveedores,direccion', 'between:3,100'],
                'email' => ['required', 'unique:proveedores,email', 'email'],
                'website' => ['url', 'nullable'],
                'telefono' => ['regex:/[0-9]{9}/', 'nullable']
            ]
        );

        //Crear nuevo registro
        $proveedor = Proveedor::create($data);
        return to_route('proveedor.index')->with('message', 'Se ha creado un nuevo registro.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        $titulo = 'Datos del proveedor';
        return view('proveedor.show', ['proveedor' => $proveedor, 'titulo' => $titulo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedor.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return to_route('proveedor.index')->with('message', 'Registro eliminado correctamente');
    }
}
