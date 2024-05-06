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
        $allCategories = Categoria::get();//recoger todas las categorías

        $rootCategories = $allCategories->whereNull('categoriaPadre');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;

    }

    private static function formatTree($categorias, $allCategories)
    {

        foreach ($categorias as $categoria) {
            $categoria->children = $allCategories->where('categoriaPadre', $categoria->id)->values();

            //Si la categoría en cuestión tiene hijos se llama al método de nuevo
            if ($categoria->children->isNotEmpty()) {
                self::formatTree($categoria->children, $allCategories);
            }
        }
    }

    /**
     * Devuele un booleano en función de si la categoría tiene una categoría padre.
     * @return bool
     */
    public function isChild(): bool
    {
        return $this->categoriaPadre !== NULL;
    }

}
