@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Creación de incidencia</h1>

<div class="col-md-6">
    <form method="POST" action="/incidencias">

        @csrf

        <div class="form-group">
            <label for="titulo">Proyecto:</label>
            <select class="form-control" name="proyecto_id">
                @foreach (\App\Proyecto::all() as $proyecto)
                    <option value="{{ $proyecto->id }}">{{ $proyecto->titulo}}<option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" required value="{{ old('titulo') }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-group col-md-3">
            <label for="cerrada">Cerrada</label>
            <select class="form-control" name="cerrada">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear incidencia</button>
        </div>

    </form>



</div>

@endsection
