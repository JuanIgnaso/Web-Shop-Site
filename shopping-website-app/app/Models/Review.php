<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['cabecera', 'review', 'producto', 'usuario', 'recomendado', 'puntuacion'];

    use HasFactory;

    /**
     * Comprueba si el usuario ya ha opinado sobre el producto
     * @return bool
     */
    function isProductReviewed($producto): bool
    {
        return \DB::table('reviews')->select()->where('producto', '=', $producto)->where('usuario', '=', \Auth::id())->count() != 0;
    }

    static function getProductReviews($producto)
    {
        return \DB::table('reviews')->select([
            'reviews.id',
            'reviews.cabecera',
            'reviews.review',
            'reviews.producto',
            'reviews.usuario',
            'reviews.recomendado',
            'reviews.puntuacion',
            'reviews.created_at as fecha_review',
            'reviews.updated_at as editado_en',
            'users.name',
            'users.created_at as registro_usuario'
        ])->leftJoin('users', 'reviews.usuario', '=', 'users.id')->where('producto', '=', $producto)->orderBy('fecha_review', 'desc')->paginate(env('PAGINATION_LENGTH'));
    }
}
