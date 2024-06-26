<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedorRequest;
use App\Models\Proveedor;
use App\Http\Controllers\Controller;
use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $proveedores = $this->filter($request)->orderBy('created_at', 'desc')->paginate(env('PAGINATION_LENGTH'));
        return view('proveedor.index', ['proveedores' => $proveedores, 'titulo' => 'Proveedores']);
    }

    private function filter($request)
    {
        return Proveedor::query()->when(
            isset($request->nombre_proveedor),
            function ($query) use ($request) {
                return $query->where('nombre_proveedor', 'LIKE', "%{$request->nombre_proveedor}%");
            }
        )->when(
                isset($request->email),
                function ($query) use ($request) {
                    return $query->where('email', 'LIKE', "%{$request->email}%");
                }
            )
            ->when(
                isset($request->website),
                function ($query) use ($request) {
                    return $query->where('website', 'LIKE', "%{$request->website}%");
                }
            );
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
    public function store(StoreProveedorRequest $request)
    {
        //validar request
        $data = $request->validated();

        //Crear nuevo registro
        $proveedor = Proveedor::create($data);
        Registro::create(['operacion' => 'Crear nuevo registro', 'tabla' => 'proveedores', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('proveedor.show', $proveedor)->with('success', 'Se ha creado un nuevo registro.');
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
        $titulo = 'Editar proveedor ID: ' . $proveedor->id;
        return view('proveedor.edit', ['proveedor' => $proveedor, 'titulo' => $titulo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //Editando un registro
        $data = $request->validate(
            [
                'nombre_proveedor' => [
                    'required',
                    Rule::unique('proveedores', 'nombre_proveedor')->ignore($proveedor),
                    'between:2,50',
                ],
                'direccion' => [
                    'required',
                    Rule::unique('proveedores', 'direccion')->ignore($proveedor), //Añadir esto para que no salte el error
                    'between:3,100'
                ],
                'email' => [
                    'required',
                    Rule::unique('proveedores', 'email')->ignore($proveedor)
                    ,
                    'email'
                ],
                'website' => ['url'],
                'telefono' => ['regex:/[0-9]{9}/']
            ]
        );
        $proveedor->update($data);
        return to_route('proveedor.show', $proveedor)->with('success', 'Los cambios se han realizado con éxito!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        Registro::create(['operacion' => 'Eliminar registro', 'tabla' => 'proveedores', 'usuario' => \Auth::id(), 'ocurrido_en' => Carbon::now()->toDateTimeString()]);
        return to_route('proveedor.index')->with('success', 'Registro eliminado correctamente');
    }
}
