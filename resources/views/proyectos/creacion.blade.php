@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Creación de proyecto</h1>

<div class="col-md-6">
    <form method="POST" action="/proyectos">

        @csrf

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="descripcion">Etiquetas:</label>
            <input type="text" class="form-control" name="etiquetas">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear proyecto</button>
        </div>

    </form>
</div>

@endsection
