<?php
namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait TraitSubirArchivo
{
    public function subirArchivo(UploadedFile $archivoSubir, $carpeta = null, $disk = 'public',
        $nombreArchivo = null)
    {
        $nombreArchivo = !is_null($nombreArchivo) ? $nombreArchivo : Str::random(15);
        $archivo = $archivoSubir->storeAs($carpeta, $nombreArchivo.'.'.$archivoSubir->
            getClientOriginalExtension(), $disk);

        return $archivo;
    }
}
