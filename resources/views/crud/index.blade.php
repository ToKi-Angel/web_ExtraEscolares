@extends('layouts/main')

@section('contenido')


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
