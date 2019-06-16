@extends('plantillas.sbadmin2')

@section('contenido')

<h1>{{ $proyecto->titulo }}</h1>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">Descripción</div>
        <div class="card-body">{{ $proyecto->descripcion }}</div>
    </div>

    <div class="card mt-2">
        <div class="card-header">Etiquetas</div>
        <div class="card-body">{{ $proyecto->etiquetas }}</div>
        <div class="card-footer"><a href="/proyectos/{{ $proyecto->id}}/edit">Editar</a></div>
    </div>
</div>

@endsection
