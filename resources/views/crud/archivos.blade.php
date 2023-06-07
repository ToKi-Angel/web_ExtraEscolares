@extends('layouts.main')

@section('contenido')
    <p class="fs-2 text-center">Archivos del Alumno</p>
    <div class="card">
        <div class="card-body">
            <h4>Archivos de Horas Cívicas (MOOC):</h4>
            @if(count($archivosCivicas) > 0)
                <ul>
                    @foreach ($archivosCivicas as $archivo)
                        <li>{{ $archivo }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron archivos de Horas Cívicas.</p>
            @endif

            <h4>Archivos de Horas Deportivas (MOOC):</h4>
            @if(count($archivosDeportivas) > 0)
                <ul>
                    @foreach ($archivosDeportivas as $archivo)
                        <li>{{ $archivo }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron archivos de Horas Deportivas.</p>
            @endif

            <h4>Archivos de Horas Culturales (MOOC):</h4>
            @if(count($archivosCulturales) > 0)
                <ul>
                    @foreach ($archivosCulturales as $archivo)
                        <li>{{ $archivo }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron archivos de Horas Culturales.</p>
            @endif
        </div>
    </div>
    <a href="/" class="btn btn-info mt-3">Regresar</a>
@endsection
