@extends('layouts/main')
@section('contenido')
    <form class="row g-3 fs-4" action="{{ route('update', $items->id) }}" method="post" enctype="multipart/form-data">

        <p class="fs-2 text-center">Editando al alumn@ {{ $items->nombre }}</p>
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

        @csrf
        @method('PUT')


        <div class="col-3">
            <label for="id" class="form-label">Matrícula</label>
            <input type="number" id="id" name="id" class="form-control" placeholder="Ingresa tu número de control"
                value="{{ $items->id }}" required>
        </div>
        <div class="col-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $items->nombre }}" required>
        </div>
        <div class="col-3">
            <label for="paterno" class="form-label">Paterno</label>
            <input type="text" id="paterno" name="paterno" class="form-control" value="{{ $items->paterno }}" required>
        </div>
        <div class="col-3">
            <label for="materno" class="form-label">Materno</label>
            <input type="text" id="materno" name="materno" class="form-control" value="{{ $items->materno }}" required>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="procedencia" class="form-label">Escuela de procedencia</label>
                <input type="text" id="procedencia" name="procedencia" class="form-control"
                    value="{{ $items->procedencia }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $items->fecha }}"
                    required>
            </div>
            <div class="col-3">
                <label for="telefono">Telefono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control"
                    placeholder="Ingresa tu número de teléfono" value="{{ $items->telefono }}" required>
            </div>
            <div class="col-3">
                <label for="tipo" class="form-label">Carrera</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    @foreach (['SIS', 'GES', 'IND'] as $tipo)
                        <option value="{{ $tipo }}" {{ $items->tipo == $tipo ? 'selected' : '' }}>
                            {{ $tipo }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-3">
                <label for="fechaIngreso">Fecha de ingreso</label>
                <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control"
                    value="{{ $items->fechaIngreso }}" required>
            </div>
        </div>


        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="mostrarArchivos" name="mostrarArchivos" checked>
            <label class="form-check-label" for="mostrarArchivos">
                Añadir horas y archivos
            </label>
        </div>

        <div class="row" id="archivos" style="display: change;">
            <!-- Parte del formulario donde van los archivos  -->
            <div class="row" id="archivos">
                <div class="col">
                    <div class="row">
                        <div class="col-3">
                            <label for="horaCivica" class="form-label">Horas Cívicas</label>
                            <input type="number" name="horaCivica" id="horaCivica" class="form-control"
                                value="{{ $items->horaCivica }}">
                        </div>
                        <div class="col-3 text-center">
                            <label for="archivosCivicos" class="form-label">MOOC</label>
                            <input type="file" id="archivosCivicos" name="archivosCivicos[]" multiple
                                class="form-control" accept=".pdf">
                        </div>
                        <div class="col-3 text-center">
                            <label for="archivosEvidenciasCivicos" class="form-label">Evidencias</label>
                            <input type="file" id="archivosEvidenciasCivicos" name="archivosEvidenciasCivicos[]"
                                multiple class="form-control" accept=".pdf">
                        </div>
                        <div class="col-3">
                            <label for="descripcionCivica" class="form-label">Ubicación Física de los archivos</label>
                            <textarea class="form-control" name="descripcionCivica" id="descripcionCivica" rows="1">{{ $items->descripcionCivica }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="horaDeportiva" class="form-label">Horas Deportivas</label>
                            <input type="number" name="horaDeportiva" id="horaDeportiva" class="form-control"
                                value="{{ $items->horaDeportiva }}">
                        </div>
                        <div class="col-3 text-center">
                            <label for="archivosDeportivos" class="form-label">MOOC</label>
                            <input type="file" id="archivosDeportivos" name="archivosDeportivos[]" multiple
                                class="form-control" accept=".pdf">
                        </div>
                        <div class="col-3 text-center">
                            <label for="archivosEvidenciasDeportivas" class="form-label">Evidencias</label>
                            <input type="file" id="archivosEvidenciasDeportivas" name="archivosEvidenciasDeportivas[]"
                                multiple class="form-control" accept=".pdf">
                        </div>
                        <div class="col-3">
                            <label for="descripcionDeportiva" class="form-label">Ubicación Física de los archivos</label>
                            <textarea class="form-control" name="descripcionDeportiva" id="descripcionDeportiva" rows="1">{{ $items->descripcionDeportiva }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="horaCultural" class="form-label">Horas Culturales</label>
                            <input type="number" name="horaCultural" id="horaCultural" class="form-control"
                                value="{{ $items->horaCultural }}">
                        </div>
                        <div class="col-3 text-center">
                            <label for="archivosCulturales" class="form-label">MOOC</label>
                            <input type="file" id="archivosCulturales" name="archivosCulturales[]" multiple
                                class="form-control" accept=".pdf">
                        </div>
                        <div class="col-3 text-center">
                            <label for="archivosEvidenciasCulturales" class="form-label">Evidencias</label>
                            <input type="file" id="archivosEvidenciasCulturales" name="archivosEvidenciasCulturales[]"
                                multiple class="form-control" accept=".pdf">
                        </div>
                        <div class="col-3">
                            <label for="descripcionCultural" class="form-label">Ubicación Física de los archivos</label>
                            <textarea class="form-control" name="descripcionCultural" id="descripcionCultural" rows="1">{{ $items->descripcionCultural }}</textarea>
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
                        document.getElementById('descripcionCivica').required = true;
                        document.getElementById('horaDeportiva').required = true;
                        document.getElementById('descripcionDeportiva').required = true;
                        document.getElementById('horaCultural').required = true;
                        document.getElementById('descripcionCultural').required = true;
                    } else {
                        archivosDiv.style.display = 'none'; // Ocultar el div
                        // Eliminar requisito de campo
                        document.getElementById('horaCivica').required = false;
                        document.getElementById('descripcionCivica').required = false;
                        document.getElementById('horaDeportiva').required = false;
                        document.getElementById('descripcionDeportiva').required = false;
                        document.getElementById('horaCultural').required = false;
                        document.getElementById('descripcionCultural').required = false;
                    }
                });
        </script>

        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-warning mt-3 mb-5">Actualizar</button>
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
@endsection
