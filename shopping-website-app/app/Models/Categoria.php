<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';


    protected $fillable = ['nombre_categoria', 'categoriaPadre'];

    static function hasDependencies($category)
    {
        return \DB::table('categorias')->select()->where('categoriaPadre', '=', $category)->count() != 0;
    }

    public static function tree()
    {
        $categorias = Categoria::get();//recoger todas las categorías

        $categoriasRaiz = $categorias->whereNull('categoriaPadre');

        foreach ($categoriasRaiz as $catRaiz) {
            $catRaiz->children = $categorias->where('categoriaPadre', $catRaiz->id);
        }

        return $categoriasRaiz;

    }


    public function subCategory()
    {
        return $this->hasMany(Categoria::class, 'categoriaPadre');
    }
}
