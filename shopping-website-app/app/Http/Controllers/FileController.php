<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FotosManager;
use App\Models\Producto;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('test', ['titulo' => 'Panel de fotos de productos', 'productos' => Producto::get(), 'imagenes' => FotosManager::paginate(10)]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'producto' => ['required', 'exists:productos,id'],
            'imagen' => ['required', 'image', 'file'],
            'alt' => ['required', 'max:200']
        ]);

        //->getClientOriginalName(); // Retrieve the original filename
        if ($request->hasFile(key: 'imagen')) {
            $imageName = time() . '.' . $request->imagen->getClientOriginalExtension();
            $path = $request->file(key: 'imagen')->storeAs('images/product_id_' . $request->producto, $imageName, 'public'); //especificas el disk (ver filesystems.php)
            FotosManager::create(['imagen' => $path, 'alt' => $request->alt, 'producto' => $request->producto]);
        }

        return redirect()->route('files.index')->with('message', 'La imagen se ha subido correctamente!');
    }
}
