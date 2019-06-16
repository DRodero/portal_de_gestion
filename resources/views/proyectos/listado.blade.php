@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Listado de proyectos</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Etiquetas</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto->id}}</td>
            <td>{{ $proyecto->titulo}}</td>
            <td>{{ $proyecto->descripcion}}</td>
            <td class="small">{{ $proyecto->etiquetas}}</td>
            <td><a href="/proyectos/{{ $proyecto->id }}/edit" class="btn btn-primary btn-sm">Editar</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
