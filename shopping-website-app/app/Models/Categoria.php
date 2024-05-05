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

}
