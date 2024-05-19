<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\Http\Controllers\Controller;
use App\Models\fotosProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request)
    {
        return view('imagenes.index', ['titulo' => 'Panel de fotos de productos', 'productos' => Producto::get(), 'imagenes' => $this->filter($request)]);
    }

    private function filter(Request $request)
    {
        return fotosProducto::query()->when(
            isset($request->producto),
            function ($query) use ($request) {
                return $query->whereIn('producto', $request->producto);
            }
        )->paginate(10);
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
            $path = FileManager::saveFile(
                [
                    'file' => $request->file(key: 'imagen'), //request que contiene el archivo
                    'path' => 'images/product_id_' . $request->producto, //ruta donde se guarda
                    'fileName' => $imageName, //nombre archivo
                    'disk' => 'public', //disco donde guardar
                ]
            );
            fotosProducto::create(['imagen' => $path, 'alt' => $request->alt, 'producto' => $request->producto]);
        }

        return redirect()->route('files.index')->with('message', 'La imagen se ha subido correctamente!');
    }

    public function destroy($id)
    {
        if (fotosProducto::deleteImage($id)) {
            return redirect()->route('files.index')->with('message', 'Archivo subido correctamente!');
        } else {
            return redirect()->route('files.index')->with('error', 'No se ha podido completar la operación.');
        }
    }
}
