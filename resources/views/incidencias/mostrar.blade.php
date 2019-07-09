@extends('plantillas.sbadmin2')

@section('contenido')

<div>
    <div class="float-right">
        <a href="/incidencias/{{ $incidencia->id}}/edit" class="btn btn-primary">Editar</a>
    </div>
    <h1>{{ $incidencia->titulo }}</h1>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">Proyecto</div>
        <div class="card-body">{{ $incidencia->proyecto->titulo }}</div>
    </div>

    <div class="card mt-2">
        <div class="card-header">Descripción</div>
        <div class="card-body">{{ $incidencia->descripcion }}</div>
    </div>

    <div class="card mt-2">
        <div class="card-header">Cerrada</div>
        <div class="card-body">{{ $incidencia->cerrada ? "Sí" : "No" }}</div>
    </div>

</div>

@endsection
