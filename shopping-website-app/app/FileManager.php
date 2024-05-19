<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class FileManager extends Storage
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Borrar un archivo
     */
    public static function deleteFile($disk, $folder, $path)
    {
        self::disk($disk)->delete($path);
        if (count(self::disk($disk)->allFiles($folder)) == 0) {
            self::deleteFolder($disk, $folder);
        }
    }

    /**
     * Borrar un directorio
     */
    private static function deleteFolder($disk, $folder)
    {
        self::disk($disk)->deleteDirectory($folder);
    }

    /**
     * Guarda un archivo y devuelve su ruta relativa.
     */
    public static function saveFile(array $params)
    {
        return $params['file']->storeAs($params['path'], $params['fileName'], $params['disk']);
    }

}
