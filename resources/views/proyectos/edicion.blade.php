@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Editar proyecto</h1>

<div class="col-md-6">
    <form method="POST" action="/proyectos/{{ $proyecto->id }}">

        @method('PATCH')

        @csrf

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" value="{{ $proyecto->titulo }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ $proyecto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="descripcion">Etiquetas:</label>
            <input type="text" class="form-control" name="etiquetas" value="{{ $proyecto->etiquetas }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>

    </form>

    <form method="POST" action="/proyectos/{{ $proyecto->id }}">

        @method('DELETE')

        @csrf

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Borrar</button>
        </div>

    </form>

</div>

@endsection
