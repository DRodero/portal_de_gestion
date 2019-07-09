@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Listado de incidencias</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Proyecto</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Cerrada</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incidencias as $incidencia)
        <tr>
            <td>{{ $incidencia->id}}</td>
            <td>{{ $incidencia->proyecto->titulo}}</td>
            <td>{{ $incidencia->titulo}}</td>
            <td>{{ $incidencia->descripcion}}</td>
            <td>{{ $incidencia->cerrada}}</td>
            <td>
                <a href="/incidencias/{{ $incidencia->id }}" class="btn btn-info btn-sm">Mostrar</a>
                <a href="/incidencias/{{ $incidencia->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
