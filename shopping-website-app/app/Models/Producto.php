<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombreProducto', 'descripcion', 'categoria', 'proveedor', 'marca', 'precio', 'unidades'];



    static function getByCategory($category)
    {
        return \DB::table('productos')->select(['productos.*', 'categorias.nombre_categoria', 'proveedores.nombre_proveedor'])->leftJoin('proveedores', 'productos.proveedor', '=', 'productos.id')->leftJoin('categorias', 'productos.categoria', '=', 'categorias.id')->where('productos.categoria', '=', $category)->orderBy('created_at', 'desc')->get();
    }




    //'productos.id','productos.nombreProducto','productos.descripcion','productos.categoria','productos.proveedor','productos.marca','productos.precio','productos.unidades'
}
