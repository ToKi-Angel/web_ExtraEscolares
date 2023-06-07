@extends('layouts/main')
@section('contenido')
    <p class="fs-2 text-center">Inicio</p>
    <div class="container">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-2">
                <a href="/crud/create" class=" btn btn-primary">Agregar alumno nuevo</a>
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
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Carrera</th>
                        <th>Teléfono</th>
                        <th>Fecha de Ingreso</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->paterno }}</td>
                            <td>{{ $item->materno }}</td>
                            <td>{{ $item->tipo }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>{{ $item->fechaIngreso }}</td>
                            <td>
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Editar</a>
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
    <a href="{{ route('logout') }}" class=" btn btn-danger mt-4"> Salir del sistema </a>
    <script>
        $(function() {
            $('#items-table').DataTable();
        });
    </script>
@endsection
