@extends('layouts/main')

@section('contenido')
<script>
    function deshabilitarBoton() {
        var boton = document.getElementById('btn-generar-pdf');
        boton.disabled = true;
        boton.style.display = 'none';

        var nuevoBoton = document.getElementById('btn-nuevo');
        nuevoBoton.style.display = 'block';

        nuevoBoton.addEventListener('click', function() {
            // Redirigir a la página de inicio
            window.location.href = '/';
        });
    }
</script>


    <div class="container">
        <div class="row">
            <h1>Formulario de Evento</h1>
            <div class="col">
                <form action="{{ route('generar-pdf-evento') }}" method="POST">
                    @csrf
                    <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                    <div class="mb-3">
                        <label for="evento" class="form-label">Evento</label>
                        <input type="text" class="form-control" id="evento" name="evento" required>
                    </div>
                    <div class="mb-3">
                        <label for="horas" class="form-label">Horas</label>
                        <input type="number" class="form-control" id="horas" name="horas" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_credito" class="form-label">Tipo de Crédito</label>
                        <select class="form-select" id="tipo_credito" name="tipo_credito" required>
                            <option value="Cívico">Cívico</option>
                            <option value="Deportivo">Deportivo</option>
                            <option value="Cultural">Cultural</option>
                        </select>
                    </div>
                    <button id="btn-generar-pdf" type="submit"  onclick="deshabilitarBoton()" class="btn btn-primary">Generar PDF</button>
                    <button id="btn-nuevo" type="button" style="display: none;" class="btn btn-success">Listo!!</button>
                </form>
            </div>
        </div>
    </div>


@endsection
