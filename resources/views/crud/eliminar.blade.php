@extends('layouts/main')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center fw-bold"><td class="icocod">&#10060;</td>Estas eliminando a {{ $items->nombre }} </h2>
                <ul>
                    <li>Con la matricula: {{ $items->id }}</li>
                    <li>De la carrera: {{ $items->tipo }}</li>
                    <li>{{ $items->horaCivica > 0 ? 'Lleva ' . $items->horaCivica . ' horas cívicas' : 'No tiene horas cívicas.' }}</li>
                    <li>{{ $items->horaDeportivaa > 0 ? 'Lleva ' . $items->horaDeportivaa . ' horas deportivas' : 'No tiene horas deportivas.' }}</li>
                    <li>{{ $items->horaCultural > 0 ? 'Lleva ' . $items->horaCultural . ' horas culturales' : 'No tiene horas culturales' }}</li>
                    <li>Esta acion no se puede deshacer!!</li>
                </ul>
                <form action="{{ route('destroy', $items->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-3">
                        <td class="icocod">&#10062;</td> Eliminar definitivamente
                    </button>
                    <a href="/" class="btn btn-success mt-3">Cancelar </a>
                </form>

            </div>
        </div>
    </div>

@endsection
