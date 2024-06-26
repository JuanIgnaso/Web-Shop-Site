<?php

namespace App\Models;

use App\FileManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class fotosProducto extends Model
{
    use HasFactory;

    protected $table = 'fotosProducto';

    protected $fillable = ['imagen', 'alt', 'producto'];

    /**
     * Elimina una foto de producto de la BBDD y del sistema de archivos
     * @param $id
     * @return bool
     */
    public static function deleteImage($id): bool
    {
        $img = self::get()->find($id);
        /* - > php artisan storage:link(enlazar archivos)
         * Se comprueba que el archivo existe, si existe:
         * -se elimina el registro de la bbdd
         * -se borra el archivo
         * -se borra el directorio padre si este está vacío.
         */
        if (Storage::disk('public')->exists($img->imagen)) {
            FileManager::deleteFile('public', 'images/product_id_' . $img->producto, $img->imagen);
            $img->delete();
            return true;
        } else {
            return false;
        }
    }

    public static function getProductImages($id)
    {
        return self::query()->where('producto', '=', $id)->get();
    }
}
