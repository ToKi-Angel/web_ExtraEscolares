@extends('layouts/main')
@section('contenido')
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    .transparent-input {
        background-color: rgba(0, 0, 0, 0) !important;
        border: none !important;
    }

    .card {
        background-color: rgba(245, 245, 245, 0.4);
    }

    .btn {
        display: inline-block;
        *display: inline;
        *zoom: 1;
        padding: 4px 10px 4px;
        margin-bottom: 0;
        font-size: 13px;
        line-height: 18px;
        color: #333333;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
        background-color: #f5f5f5;
        background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -webkit-gradient(linear,
                0 0,
                0 100%,
                from(#ffffff),
                to(#e6e6e6));
        background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
        background-image: linear-gradient(top, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0);
        border-color: #e6e6e6 #e6e6e6 #e6e6e6;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        border: 1px solid #e6e6e6;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),
            0 1px 2px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),
            0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),
            0 1px 2px rgba(0, 0, 0, 0.05);
        cursor: pointer;
        *margin-left: 0.3em;
    }

    .btn:hover,
    .btn:active,
    .btn.active,
    .btn.disabled,
    .btn[disabled] {
        background-color: #e6e6e6;
    }

    .btn-large {
        padding: 9px 14px;
        font-size: 15px;
        line-height: normal;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .btn:hover {
        color: #333333;
        text-decoration: none;
        background-color: #e6e6e6;
        background-position: 0 -15px;
        -webkit-transition: background-position 0.1s linear;
        -moz-transition: background-position 0.1s linear;
        -ms-transition: background-position 0.1s linear;
        -o-transition: background-position 0.1s linear;
        transition: background-position 0.1s linear;
    }

    .btn-primary,
    .btn-primary:hover {
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        color: #ffffff;
    }

    .btn-primary.active {
        color: rgba(255, 255, 255, 0.75);
    }

    .btn-primary {
        background-color: #4a77d4;
        background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: -webkit-gradient(linear,
                0 0,
                0 100%,
                from(#6eb6de),
                to(#4a77d4));
        background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: -o-linear-gradient(top, #6eb6de, #4a77d4);
        background-image: linear-gradient(top, #6eb6de, #4a77d4);
        background-repeat: repeat-x;
        filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);
        border: 1px solid #3762bc;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2),
            0 1px 2px rgba(0, 0, 0, 0.5);
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary.active,
    .btn-primary.disabled,
    .btn-primary[disabled] {
        filter: none;
        background-color: #4a77d4;
    }

    .btn-block {
        width: 100%;
        display: block;
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;
    }

    html {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    body {
        width: 100%;
        height: 100%;
        font-family: "Open Sans", sans-serif;
        background: #092756;
        background: -moz-radial-gradient(0% 100%,
                ellipse cover,
                rgba(104, 128, 138, 0.4) 10%,
                rgba(138, 114, 76, 0) 40%),
            -moz-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%),
            -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -webkit-radial-gradient(0% 100%,
                ellipse cover,
                rgba(104, 128, 138, 0.4) 10%,
                rgba(138, 114, 76, 0) 40%),
            -webkit-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42,
                    60,
                    87,
                    0.4) 100%),
            -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -o-radial-gradient(0% 100%,
                ellipse cover,
                rgba(104, 128, 138, 0.4) 10%,
                rgba(138, 114, 76, 0) 40%),
            -o-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%),
            -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -ms-radial-gradient(0% 100%,
                ellipse cover,
                rgba(104, 128, 138, 0.4) 10%,
                rgba(138, 114, 76, 0) 40%),
            -ms-linear-gradient(top, rgba(57, 173, 219, 0.25) 0%, rgba(42, 60, 87, 0.4) 100%),
            -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
        background: -webkit-radial-gradient(0% 100%,
                ellipse cover,
                rgba(104, 128, 138, 0.4) 10%,
                rgba(138, 114, 76, 0) 40%),
            linear-gradient(to bottom,
                rgba(57, 173, 219, 0.25) 0%,
                rgba(42, 60, 87, 0.4) 100%),
            linear-gradient(135deg, #670d10 0%, #092756 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1);
    }

    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -150px 0 0 -150px;
        width: 300px;
        height: 300px;
    }

    .login h1 {
        color: #fff;
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        letter-spacing: 1px;
        text-align: center;
    }

    input {
        width: 100%;
        margin-bottom: 10px;
        background: rgba(0, 0, 0, 0.3);
        border: none;
        outline: none;
        padding: 10px;
        font-size: 13px;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2),
            0 1px 1px rgba(255, 255, 255, 0.2);
        -webkit-transition: box-shadow 0.5s ease;
        -moz-transition: box-shadow 0.5s ease;
        -o-transition: box-shadow 0.5s ease;
        -ms-transition: box-shadow 0.5s ease;
        transition: box-shadow 0.5s ease;
    }

    input:focus {
        box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.4),
            0 1px 1px rgba(255, 255, 255, 0.2);
    }
</style>

    <p class="fs-2 text-center">Agregar alumno</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <script>
            setTimeout(function() {
                $('.alert-danger').fadeOut('slow');
            }, 5000);
        </script>
    @endif

    <div class="container">
        <form class="g-3 fs-4" action="store" method="post" enctype="multipart/form-data" id="alumnoForm">
            <div class="row">
                @csrf
                @method('POST')
                <div class="col-3">
                    <label for="id" class="form-label">Matrícula</label>
                    <input type="number" id="id" name="id" class="form-control"
                        placeholder="Ingresa tu número de control" value="{{ old('id') }}" required>
                </div>
                <div class="col-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"
                        required>
                </div>
                <div class="col-3">
                    <label for="paterno" class="form-label">Paterno</label>
                    <input type="text" id="paterno" name="paterno" class="form-control" value="{{ old('paterno') }}"
                        required>
                </div>
                <div class="col-3">
                    <label for="materno" class="form-label">Materno</label>
                    <input type="text" id="materno" name="materno" class="form-control" value="{{ old('materno') }}"
                        required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="procedencia" class="form-label">Escuela de procedencia</label>
                    <input type="text" id="procedencia" name="procedencia" class="form-control"
                        value="{{ old('procedencia') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="fecha">Fecha de nacimiento</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}"
                        required>
                </div>
                <div class="col-3">
                    <label for="telefono">Telefono</label>
                    <input type="tel" id="telefono" name="telefono" class="form-control"
                        placeholder="Ingresa tu número de teléfono" value="{{ old('telefono') }}" required>
                </div>
                <div class="col-3">
                    <label for="tipo" class="form-label">Carrera</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        @foreach (['Ing. en Sistemas Computacionales', 'Ing. Destión Empresarial', 'Ing. industrial'] as $tipo)
                            <option value="{{ $tipo }}">{{ $tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="fechaIngreso">Fecha de ingreso</label>
                    <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control"
                        value="{{ old('fechaIngreso') }}" required>
                </div>
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mostrarArchivos" name="mostrarArchivos">
                <label class="form-check-label" for="mostrarArchivos">
                    Añadir horas y archivos
                </label>
            </div>

            <div class="row" id="archivos" style="display: none;">
                <!-- Parte del formulario donde van los archivos  -->
                <div class="row" id="archivos">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <label for="horaCivica" class="form-label">Horas Cívicas</label>
                                <input type="number" name="horaCivica" id="horaCivica" class="form-control"
                                    value="{{ old('horaCivica') }}">
                            </div>
                            <div class="col-3 text-center">
                                <label for="archivosCivicos" class="form-label">MOOC</label>
                                <input type="file" id="archivosCivicos" name="archivosCivicos[]" multiple
                                    class="form-control" value="{{ old('archivosCivicos') }}">
                            </div>
                            <div class="col-3 text-center">
                                <label for="archivosEvidenciasCivicos" class="form-label">Evidencias</label>
                                <input type="file" id="archivosEvidenciasCivicos" name="archivosEvidenciasCivicos[]"
                                    multiple class="form-control" value="{{ old('archivosEvidenciasCivicos') }}">
                            </div>
                            <div class="col-3">
                                <label for="descripcionCivica" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcionCivica" id="descripcionCivica" rows="1">{{ old('descripcionCivica') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="horaDeportiva" class="form-label">Horas Deportivas</label>
                                <input type="number" name="horaDeportiva" id="horaDeportiva" class="form-control"
                                    value="{{ old('horaDeportiva') }}">
                            </div>
                            <div class="col-3 text-center">
                                <label for="archivosDeportivos" class="form-label">MOOC</label>
                                <input type="file" id="archivosDeportivos" name="archivosDeportivos[]" multiple
                                    class="form-control" value="{{ old('archivosDeportivos') }}">
                            </div>
                            <div class="col-3 text-center">
                                <label for="archivosEvidenciasDeportivas" class="form-label">Evidencias</label>
                                <input type="file" id="archivosEvidenciasDeportivas"
                                    name="archivosEvidenciasDeportivas[]" multiple class="form-control"
                                    value="{{ old('archivosEvidenciasDeportivas') }}">
                            </div>
                            <div class="col-3">
                                <label for="descripcionDeportiva" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcionDeportiva" id="descripcionDeportiva" rows="1">{{ old('descripcionDeportiva') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <label for="horaCultural" class="form-label">Horas Culturales</label>
                                <input type="number" name="horaCultural" id="horaCultural" class="form-control"
                                    value="{{ old('horaCultural') }}">
                            </div>
                            <div class="col-3 text-center">
                                <label for="archivosCulturales" class="form-label">MOOC</label>
                                <input type="file" id="archivosCulturales" name="archivosCulturales[]" multiple
                                    class="form-control" value="{{ old('archivosCulturales') }}">
                            </div>
                            <div class="col-3 text-center">
                                <label for="archivosEvidenciasCulturales" class="form-label">Evidencias</label>
                                <input type="file" id="archivosEvidenciasCulturales"
                                    name="archivosEvidenciasCulturales[]" multiple class="form-control"
                                    value="{{ old('archivosEvidenciasCulturales') }}">
                            </div>
                            <div class="col-3">
                                <label for="descripcionCultural" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcionCultural" id="descripcionCultural" rows="1">{{ old('descripcionCultural') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Obtener el checkbox y el div de archivos
                const checkbox = document.getElementById('mostrarArchivos');
                const archivosDiv = document.getElementById('archivos');

                // Manejar el evento de cambio del checkbox
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        archivosDiv.style.display = 'block'; // Mostrar el div
                        // Establecer campo como requerido
                        document.getElementById('horaCivica').required = true;
                        document.getElementById('archivosEvidenciasCivicos').required = true;
                        document.getElementById('descripcionCivica').required = true;
                        document.getElementById('horaDeportiva').required = true;
                        document.getElementById('archivosEvidenciasDeportivas').required = true;
                        document.getElementById('descripcionDeportiva').required = true;
                        document.getElementById('horaCultural').required = true;
                        document.getElementById('archivosEvidenciasCulturales').required = true;
                        document.getElementById('descripcionCultural').required = true;
                    } else {
                        archivosDiv.style.display = 'none'; // Ocultar el div
                        // Eliminar requisito de campo
                        document.getElementById('horaCivica').required = false;
                        document.getElementById('archivosEvidenciasCivicos').required = false;
                        document.getElementById('descripcionCivica').required = false;
                        document.getElementById('horaDeportiva').required = false;
                        document.getElementById('archivosEvidenciasDeportivas').required = false;
                        document.getElementById('descripcionDeportiva').required = false;
                        document.getElementById('horaCultural').required = false;
                        document.getElementById('archivosEvidenciasCulturales').required = false;
                        document.getElementById('descripcionCultural').required = false;
                    }
                });
            </script>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-success mt-3 mb-5">Agregar</button>
                    <a href="/" class="btn btn-danger mt-3 mb-5">Cancelar </a>
                </div>
            </div>

        </form>
        <script>
            // Evitar que el usuario regrese a la página anterior utilizando las flechas de navegación
            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                history.go(1);
            };
        </script>
    </div>

@endsection
