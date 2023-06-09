@extends('layouts.main')

@section('contenido')

<a href="/" class="btn btn-info mt-3">Regresar</a>
    <p class="fs-2 text-center">Archivos del Alumno</p>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Archivos de Horas Cívicas (MOOC):</h4>
                        @if ($existeMoocCivico)
                            <iframe src="{{ asset($archivoMoocCivico) }}" width="100%" height="300px"></iframe>
                        @else
                            <p>No se encontró el archivo MOOC en las Horas Cívicas.</p>
                        @endif
                    </div>
                    <div class="col">
                        <h4>Archivos de Horas Cívicas (Evidencias):</h4>
                        @if ($existeEvidenciasCivicas)
                            <iframe src="{{ asset($archivoEvidenciasCivicas) }}" width="100%" height="300px"></iframe>
                        @else
                            <p>No se encontró el archivo de evidencias en las Horas Cívicas.</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Archivos de Horas Deportivas (MOOC):</h4>
                        @if ($existeMoocDeportivas)
                            <iframe src="{{ asset($archivoMoocDeportivas) }}" width="100%" height="300px"></iframe>
                        @else
                            <p>No se encontró el archivo MOOC en las Horas Deportivas.</p>
                        @endif
                    </div>
                    <div class="col">
                        <h4>Archivos de Horas Deportivas (Evidencias):</h4>
                        @if ($existeEvidenciasDeportivas)
                            <iframe src="{{ asset($archivoEvidenciasDeportivas) }}" width="100%" height="300px"></iframe>
                        @else
                            <p>No se encontró el archivo de evidencias en las Horas Deportivas.</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Archivos de Horas Culturales (MOOC):</h4>
            @if ($existeMoocCulturales)
                <iframe src="{{ asset($archivoMoocCulturales) }}" width="100%" height="300px"></iframe>
            @else
                <p>No se encontró el archivo MOOC en las Horas Culturales.</p>
            @endif
                    </div>
                    <div class="col">
                        <h4>Archivos de Horas Culturales (Evidencias):</h4>
            @if ($existeEvidenciasCulturales)
                <iframe src="{{ asset($archivoEvidenciasCulturales) }}" width="100%" height="300px"></iframe>
            @else
                <p>No se encontró el archivo de evidencias en las Horas Culturales.</p>
            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
