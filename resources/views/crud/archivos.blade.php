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
                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $archivoMoocCivico }}">Eliminar</button>
                            </div>
                        @else
                            <p>No se encontró el archivo MOOC en las Horas Cívicas.</p>
                            <a href="{{ route('edit', $matricula) }}" class="btn btn-warning">Añadir</a>
                        @endif
                    </div>
                    <div class="col">
                        <h4>Archivos de Horas Cívicas (Evidencias):</h4>
                        @if ($existeEvidenciasCivicas)
                            <iframe src="{{ asset($archivoEvidenciasCivicas) }}" width="100%" height="300px"></iframe>
                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $archivoEvidenciasCivicas }}">Eliminar</button>
                            </div>
                        @else
                            <p>No se encontró el archivo de evidencias en las Horas Cívicas.</p>
                            <a href="{{ route('edit', $matricula) }}" class="btn btn-warning">Añadir</a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Archivos de Horas Deportivas (MOOC):</h4>
                        @if ($existeMoocDeportivas)
                            <iframe src="{{ asset($archivoMoocDeportivas) }}" width="100%" height="300px"></iframe>
                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $archivoMoocDeportivas }}">Eliminar</button>
                            </div>
                        @else
                            <p>No se encontró el archivo MOOC en las Horas Deportivas.</p>
                            <a href="{{ route('edit', $matricula) }}" class="btn btn-warning">Añadir</a>
                        @endif
                    </div>
                    <div class="col">
                        <h4>Archivos de Horas Deportivas (Evidencias):</h4>
                        @if ($existeEvidenciasDeportivas)
                            <iframe src="{{ asset($archivoEvidenciasDeportivas) }}" width="100%" height="300px"></iframe>
                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $archivoEvidenciasDeportivas }}">Eliminar</button>
                            </div>
                        @else
                            <p>No se encontró el archivo de evidencias en las Horas Deportivas.</p>
                            <a href="{{ route('edit', $matricula) }}" class="btn btn-warning">Añadir</a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Archivos de Horas Culturales (MOOC):</h4>
                        @if ($existeMoocCulturales)
                            <iframe src="{{ asset($archivoMoocCulturales) }}" width="100%" height="300px"></iframe>
                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $archivoMoocCulturales }}">Eliminar</button>
                            </div>
                        @else
                            <p>No se encontró el archivo MOOC en las Horas Culturales.</p>
                            <a href="{{ route('edit', $matricula) }}" class="btn btn-warning">Añadir</a>
                        @endif
                    </div>
                    <div class="col">
                        <h4>Archivos de Horas Culturales (Evidencias):</h4>
                        @if ($existeEvidenciasCulturales)
                            <iframe src="{{ asset($archivoEvidenciasCulturales) }}" width="100%" height="300px"></iframe>
                            <div class="d-flex justify-content-between mt-2">
                                <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $archivoEvidenciasCulturales }}">Eliminar</button>
                            </div>
                        @else
                            <p>No se encontró el archivo de evidencias en las Horas Culturales.</p>
                            <a href="{{ route('edit', $matricula) }}" class="btn btn-warning">Editar</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            // Eliminar archivo
            $('.eliminar-archivo').on('click', function() {
                var ruta = $(this).data('ruta');

                swal({
                    title: "¿Estás seguro de eliminar el archivo?",
                    text: "Esta acción no se puede deshacer",
                    icon: "warning",
                    buttons: ["Cancelar", "Eliminar"],
                    dangerMode: true,
                }).then(function(confirm) {
                    if (confirm) {
                        eliminarArchivo(ruta);
                    }
                });
            });

            function eliminarArchivo(ruta) {
                $.ajax({
                    url: '/eliminar-archivo',
                    type: 'POST',
                    data: {
                        ruta: ruta
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        swal('Éxito', response.message, 'success').then(function() {
                            window.location.href = window.location
                            .href; // Redirigir a la misma página
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        swal('Error', 'Ocurrió un error al eliminar el archivo.', 'error');
                    }
                });
            }
        });
    </script>
@endsection
