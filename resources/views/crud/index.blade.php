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

<p class="fs-2 text-center" style="background: linear-gradient(to right, #4facde, #7508d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Inicio</p>

    <div class="container">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-2">
                <a href="/crud/create" class="btn btn-primary">Agregar alumno nuevo</a>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-dark table-striped table-hover" id="items-table">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Alumno</th>
                        <th>Carrera</th>
                        <th>Teléfono</th>
                        <th>Documentos</th>
                        <th>Editar</th>
                        <th>Evento</th>
                        <th>Reporte</th>
                        <th>Constancia deportiva</th>
                        <th>Constancia cultural</th>
                        <th>Constancia cívica</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }} {{ $item->paterno }} {{ $item->materno }}</td>
                            <td>{{ $item->tipo }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>
                                <a href="{{ route('archivos', $item->id) }}" class="btn btn-primary">Documentos</a>
                            </td>
                            <td>
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <a href="{{ route('formulario-evento', $item->id) }}" class="btn btn-success">Evento</a>
                            </td>
                            <td>
                                <a href="{{ route('generar-comprobante', $item->id) }}" class="btn btn-success">Reporte</a>
                            </td>
                            <td>
                                <button onclick="window.location.href = '{{ route('constancia-deportiva', ['id' => $item->id]) }}'" class="btn btn-secondary" {{ $item->horaDeportiva >= 20 ? '' : 'disabled' }}>Constancia deportiva</button>
                            </td>
                            <td>
                                <button onclick="window.location.href = '{{ route('constancia-cultural', ['id' => $item->id]) }}'" class="btn btn-secondary" {{ $item->horaCultural >= 20 ? '' : 'disabled' }}>Constancia cultural</button>
                            </td>
                            <td>
                                <button onclick="window.location.href = '{{ route('constancia-civica', ['id' => $item->id]) }}'" class="btn btn-secondary" {{ $item->horaCivica >= 20 ? '' : 'disabled' }}>Constancia cívica</button>
                            </td>
                            <td>
                                <a href="{{ route('show', $item->id) }}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(function() {
            $('#items-table').DataTable({
                "responsive": true
            });
        });
    </script>
@endsection
