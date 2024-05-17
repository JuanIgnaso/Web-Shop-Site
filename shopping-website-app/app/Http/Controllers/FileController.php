<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('test', ['titulo' => 'Subir archivo', 'productos' => Producto::get()]);
    }

    public function store(Request $request)
    {
        //Validar archivo
        $data = $request->validate([
            'producto' => ['required', 'exists:productos,id'],
            'imagen' => ['required', 'image', 'file'],
            'alt' => ['required', 'max:200']
        ]);

        //Comprobar que tiene imagen
        //->getClientOriginalName(); // Retrieve the original filename
        if ($request->hasFile(key: 'imagen')) {
            $request->file(key: 'imagen')->store('products/images', 'public'); //especificas el disk (ver filesystems.php)
        }

        return redirect()->route('panel.index');
    }
}
