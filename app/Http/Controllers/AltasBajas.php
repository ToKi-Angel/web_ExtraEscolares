<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AltasBajas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    public function index()
    {

        $titulo = 'Inicio';
        $items = Ingreso::all();

        return view('/crud/index', compact('titulo', 'items'));
    }

    public function tabla()
    {
        $titulo = 'Información';
        $items = Ingreso::all();
        return view('/crud/tabla', compact('titulo', 'items'));
    }

    public function create()
    {

        $titulo = 'Agregar';
        return view('/crud/create', compact('titulo'));
    }

    public function store(Request $request)
{
    ini_set('post_max_size', '16M');
    $request->validate([
        'id' => 'required|unique:ingreso,id',
    ], [
        'id.unique' => 'La matrícula ya existe, verifique los datos por favor :/',
    ]);

    $item = new Ingreso();
    $item->id = $request->id;
    $item->nombre = $request->nombre;
    $item->paterno = $request->paterno;
    $item->materno = $request->materno;
    $item->tipo = $request->tipo;
    $item->categoria = $request->categoria;
    $item->cantidad = $request->cantidad;
    $item->telefono = $request->telefono;
    $item->horaCivica = $request->horaCivica;
    $item->horaDeportiva = $request->horaDeportiva;
    $item->horaCultural = $request->horaCultural;
    $item->procedencia = $request->procedencia;
    $item->descripcion = $request->descripcion;
    $item->descripcionCultural = $request->descripcionCultural;
    $item->descripcionDeportiva = $request->descripcionDeportiva;
    $item->descripcionCivica = $request->descripcionCivica;
    $item->fecha = $request->fecha;
    $item->fechaIngreso = $request->fechaIngreso;
    $item->save();

    // Crear la carpeta con el nombre de la matrícula
    $matricula = $request->id;
    $carpetaAlumno = public_path('Alumnos/' . $matricula);
    if (!file_exists($carpetaAlumno)) {
        mkdir($carpetaAlumno, 0755, true);
    }

    // Crear carpetas adicionales dentro de la carpeta de la matrícula
    $carpetaHorasCivicas = $carpetaAlumno . '/HorasCivicas';
    $carpetaHorasDeportivas = $carpetaAlumno . '/HorasDeportivas';
    $carpetaHorasCulturales = $carpetaAlumno . '/HorasCulturales';

    if (!file_exists($carpetaHorasCivicas)) {
        mkdir($carpetaHorasCivicas, 0755, true);
    }

    if (!file_exists($carpetaHorasDeportivas)) {
        mkdir($carpetaHorasDeportivas, 0755, true);
    }

    if (!file_exists($carpetaHorasCulturales)) {
        mkdir($carpetaHorasCulturales, 0755, true);
    }

    // Mover archivos subidos a la carpeta MOOC de Horas Cívicas
    if ($request->hasFile('archivosCivicos')) {
        $archivosCivicos = $request->file('archivosCivicos');
        foreach ($archivosCivicos as $archivo) {
            $nombreArchivo = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $archivo->getClientOriginalExtension();
            $nombreCompleto = $nombreArchivo . '.' . $extension;
            $archivo->move($carpetaHorasCivicas . '/MOOC', $nombreCompleto);
        }
    }

    // Mover archivos subidos a la carpeta Evidencias de Horas Cívicas
    if ($request->hasFile('archivosEvidenciasCivicos')) {
        $archivosEvidenciasCivicos = $request->file('archivosEvidenciasCivicos');
        foreach ($archivosEvidenciasCivicos as $archivo) {
            $nombreArchivo = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $archivo->getClientOriginalExtension();
            $nombreCompleto = $nombreArchivo . '.' . $extension;
            $archivo->move($carpetaHorasCivicas . '/Evidencias', $nombreCompleto);
        }
    }

    // Mover archivos subidos a la carpeta MOOC de Horas Deportivas
    if ($request->hasFile('archivosDeportivos')) {
        $archivosDeportivos = $request->file('archivosDeportivos');
        foreach ($archivosDeportivos as $archivo) {
            $nombreArchivo = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $archivo->getClientOriginalExtension();
            $nombreCompleto = $nombreArchivo . '.' . $extension;
            $archivo->move($carpetaHorasDeportivas . '/MOOC', $nombreCompleto);
        }
    }

    // Mover archivos subidos a la carpeta Evidencias de Horas Deportivas
    if ($request->hasFile('archivosEvidenciasDeportivas')) {
        $archivosEvidenciasDeportivas = $request->file('archivosEvidenciasDeportivas');
        foreach ($archivosEvidenciasDeportivas as $archivo) {
            $nombreArchivo = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $archivo->getClientOriginalExtension();
            $nombreCompleto = $nombreArchivo . '.' . $extension;
            $archivo->move($carpetaHorasDeportivas . '/Evidencias', $nombreCompleto);
        }
    }

    // Mover archivos subidos a la carpeta MOOC de Horas Culturales
    if ($request->hasFile('archivosCulturales')) {
        $archivosCulturales = $request->file('archivosCulturales');
        foreach ($archivosCulturales as $archivo) {
            $nombreArchivo = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $archivo->getClientOriginalExtension();
            $nombreCompleto = $nombreArchivo . '.' . $extension;
            $archivo->move($carpetaHorasCulturales . '/MOOC', $nombreCompleto);
        }
    }

    // Mover archivos subidos a la carpeta Evidencias de Horas Culturales
    if ($request->hasFile('archivosEvidenciasCulturales')) {
        $archivosEvidenciasCulturales = $request->file('archivosEvidenciasCulturales');
        foreach ($archivosEvidenciasCulturales as $archivo) {
            $nombreArchivo = Str::slug(pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $archivo->getClientOriginalExtension();
            $nombreCompleto = $nombreArchivo . '.' . $extension;
            $archivo->move($carpetaHorasCulturales . '/Evidencias', $nombreCompleto);
        }
    }

    Alert::success('Agregado', 'Se agregó correctamente');
    return redirect('/crud/tabla');
}





    public function show($id)
    {
        $titulo = "Eliminar ingreso";
        $items = Ingreso::find($id);
        return view("/crud/eliminar", compact('items', 'titulo'));
    }

    public function edit($id)
    {
        $titulo = 'Actualizar datos';
        $items = Ingreso::find($id);
        return view('/crud/edit', compact('items', 'titulo'));
    }

    public function update(Request $request, $id)
    {
        $item = Ingreso::find($id);
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->descripcion = $request->descripcion;
        $item->fecha = $request->fecha;
        $item->save();
        Alert::success('Actualizado', 'Se actualizó correctamente');
        return redirect('/crud/tabla');
    }

    public function destroy($id)
    {
        $item = Ingreso::find($id);
        $item->delete();
        Alert::success('Eliminado', 'Se eliminó correctamente');
        return redirect('/crud');
    }
}
