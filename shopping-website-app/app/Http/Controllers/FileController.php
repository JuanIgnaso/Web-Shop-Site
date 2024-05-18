<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FileManager;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('imagenes.index', ['titulo' => 'Panel de fotos de productos', 'productos' => Producto::get(), 'imagenes' => FileManager::paginate(10)]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'producto' => ['required', 'exists:productos,id'],
            'imagen' => ['required', 'image', 'file'],
            'alt' => ['required', 'max:200']
        ]);

        if ($request->hasFile(key: 'imagen')) {
            $imageName = time() . '.' . $request->imagen->getClientOriginalExtension();
            $path = $request->file(key: 'imagen')->storeAs('images/product_id_' . $request->producto, $imageName, 'public'); //especificas el disk (ver filesystems.php)
            FileManager::create(['imagen' => $path, 'alt' => $request->alt, 'producto' => $request->producto]);
        }

        return redirect()->route('files.index')->with('message', 'La imagen se ha subido correctamente!');
    }

    public function destroy($id)
    {
        if (FileManager::deleteImage($id)) {
            return redirect()->route('files.index')->with('message', 'Archivo subido correctamente!');
        } else {
            return redirect()->route('files.index')->with('error', 'No se ha podido completar la operación.');
        }
    }
}
