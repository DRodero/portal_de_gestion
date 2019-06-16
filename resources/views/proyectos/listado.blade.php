@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Listado de proyectos</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto->id}}</td>
            <td>{{ $proyecto->titulo}}</td>
            <td>{{ $proyecto->descripcion}}</td>
            <td class="small">{{ $proyecto->etiquetas}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
