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
        $rutaCivicasMOOC = 'Alumnos/' . $matricula . '/HorasCivicas/MOOC';
        $rutaCivicasEvidencias = 'Alumnos/' . $matricula . '/HorasCivicas/Evidencias';
        $rutaDeportivasMOOC = 'Alumnos/' . $matricula . '/HorasDeportivas/MOOC';
        $rutaDeportivasEvidencias = 'Alumnos/' . $matricula . '/HorasDeportivas/Evidencias';
        $rutaCulturalesMOOC = 'Alumnos/' . $matricula . '/HorasCulturales/MOOC';
        $rutaCulturalesEvidencias = 'Alumnos/' . $matricula . '/HorasCulturales/Evidencias';

        $archivoMoocCivico = $rutaCivicasMOOC . '/mooc.pdf';
        $archivoEvidenciasCivicas = $rutaCivicasEvidencias . '/evidencias.pdf';
        $archivoMoocDeportivas = $rutaDeportivasMOOC . '/mooc.pdf';
        $archivoEvidenciasDeportivas = $rutaDeportivasEvidencias . '/evidencias.pdf';
        $archivoMoocCulturales = $rutaCulturalesMOOC . '/mooc.pdf';
        $archivoEvidenciasCulturales = $rutaCulturalesEvidencias . '/evidencias.pdf';

        $existeMoocCivico = file_exists(public_path($archivoMoocCivico));
        $existeEvidenciasCivicas = file_exists(public_path($archivoEvidenciasCivicas));
        $existeMoocDeportivas = file_exists(public_path($archivoMoocDeportivas));
        $existeEvidenciasDeportivas = file_exists(public_path($archivoEvidenciasDeportivas));
        $existeMoocCulturales = file_exists(public_path($archivoMoocCulturales));
        $existeEvidenciasCulturales = file_exists(public_path($archivoEvidenciasCulturales));

        return view('crud.archivos', compact(
            'titulo',
            'archivoMoocCivico',
            'archivoEvidenciasCivicas',
            'archivoMoocDeportivas',
            'archivoEvidenciasDeportivas',
            'archivoMoocCulturales',
            'archivoEvidenciasCulturales',
            'existeMoocCivico',
            'existeEvidenciasCivicas',
            'existeMoocDeportivas',
            'existeEvidenciasDeportivas',
            'existeMoocCulturales',
            'existeEvidenciasCulturales',
            'matricula',
            'rutaCivicasMOOC',
            'rutaCivicasEvidencias',
            'rutaDeportivasMOOC',
            'rutaDeportivasEvidencias',
            'rutaCulturalesMOOC',
            'rutaCulturalesEvidencias'
        ));
    }
}
