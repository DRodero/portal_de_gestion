@extends('plantillas.sbadmin2')

@section('contenido')

<div>
    <div class="float-right">
        <a href="/proyectos/{{ $proyecto->id}}/edit" class="btn btn-primary">Editar</a>
    </div>
    <h1>{{ $proyecto->titulo }}</h1>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">Descripción</div>
        <div class="card-body">{{ $proyecto->descripcion }}</div>
    </div>

    <div class="card mt-2">
        <div class="card-header">Etiquetas</div>
        <div class="card-body">{{ $proyecto->etiquetas }}</div>
    </div>
</div>

@endsection
