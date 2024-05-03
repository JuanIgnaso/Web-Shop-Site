<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;
    protected $table = 'reviews';
    protected $fillable = ['cabecera', 'review', 'producto', 'usuario', 'recomendado', 'puntuacion', 'fecha_review'];

    use HasFactory;

    /**
     * Comprueba si el usuario ya ha opinado sobre el producto
     * @return bool
     */
    function isProductReviewed($producto): bool
    {
        return \DB::table('reviews')->select()->where('producto', '=', $producto)->where('usuario', '=', \Auth::id())->count() != 0;
    }
}
