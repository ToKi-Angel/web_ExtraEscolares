<?php

namespace App\Http\Controllers;
/*
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function mostrarArchivos($matricula)
    {
        $titulo = 'Mostrar archivos';
        $rutaCivicas = 'Alumnos/' . $matricula . '/HorasCivicas/MOOC';
        $rutaDeportivas = 'Alumnos/' . $matricula . '/HorasDeportivas/MOOC';
        $rutaCulturales = 'Alumnos/' . $matricula . '/HorasCulturales/MOOC';

        $archivosCivicas = Storage::files($rutaCivicas);
        $archivosDeportivas = Storage::files($rutaDeportivas);
        $archivosCulturales = Storage::files($rutaCulturales);

        return view('crud/archivos', compact('titulo'))->with([
            'archivosCivicas' => $archivosCivicas,
            'archivosDeportivas' => $archivosDeportivas,
            'archivosCulturales' => $archivosCulturales,
        ]);
    }
}*/

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchivoController extends Controller
{
    public function mostrarArchivos($matricula)
{
    $titulo = 'Mostrar archivos';
    $rutaCivicas = 'Alumnos/' . $matricula . '/HorasCivicas/MOOC';
    $rutaDeportivas = 'Alumnos/' . $matricula . '/HorasDeportivas/MOOC';
    $rutaCulturales = 'Alumnos/' . $matricula . '/HorasCulturales/MOOC';

    /*dd($rutaCivicas, $rutaDeportivas, $rutaCulturales);*/

    $archivosCivicas = Storage::files($rutaCivicas);
    $archivosDeportivas = Storage::files($rutaDeportivas);
    $archivosCulturales = Storage::files($rutaCulturales);

    return view('crud.archivos', compact('titulo', 'archivosCivicas', 'archivosDeportivas', 'archivosCulturales'));
}

}

