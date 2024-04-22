<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    public $timestamps = false; //Evitar que laravel maneje de forma automática las columnas created_at y updated_at

    protected $fillable = ['operacion', 'tabla', 'usuario', 'ocurrido_en'];

}
