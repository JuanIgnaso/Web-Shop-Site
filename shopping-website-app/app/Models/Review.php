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
}
