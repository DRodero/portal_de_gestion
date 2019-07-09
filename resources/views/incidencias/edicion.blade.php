@extends('plantillas.sbadmin2')

@section('contenido')

<h1>Editar incidencia</h1>

<div class="col-md-6">
    <form method="POST" action="/incidencias/{{ $incidencia->id }}">

        @method('PATCH')

        @csrf

        <div class="form-group">
            <label for="titulo">Proyecto:</label>
            <select class="form-control" name="proyecto_id">
                @foreach (\App\Proyecto::all() as $proyecto)
                    <option value="{{ $proyecto->id }}"
                        {{ ($incidencia->proyecto_id == $proyecto->id) ? "selected" : "" }}>
                        {{ $proyecto->titulo}}
                    <option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" value="{{ $incidencia->titulo }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" class="form-control">{{ $incidencia->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <div class="form-group col-md-3">
                    <label for="cerrada">Cerrada</label>
                    <select class="form-control" name="cerrada">
                        <option value="0" {{ ($incidencia->cerrada == 0) ? "selected" : "" }}>No</option>
                        <option value="1" {{ ($incidencia->cerrada == 1) ? "selected" : "" }}>Sí</option>
                    </select>
                </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>

    </form>

    <form method="POST" action="/incidencias/{{ $incidencia->id }}">

        @method('DELETE')

        @csrf

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Borrar</button>
        </div>

    </form>

</div>

@endsection
