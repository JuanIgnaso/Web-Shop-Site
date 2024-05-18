<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosManager extends Model
{
    use HasFactory;

    protected $table = 'fotosProducto';

    protected $fillable = ['imagen', 'alt', 'producto'];

}
