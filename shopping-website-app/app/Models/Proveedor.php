<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; //una forma de sobreescribir la tabla del modelo

    protected $fillable = ['nombre_proveedor', 'direccion', 'email', 'website', 'telefono'];
}
