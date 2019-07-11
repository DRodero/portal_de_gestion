@extends('plantillas.sbadmin2')

@section('contenido')

<div>
    <h1>Subir ficheros</h1>
</div>


<div class="col-md-6">
    <div class="card">
        <div class="card-header">Imagen</div>
        <div class="card-body">

                <form action="/subir_ficheros" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Por favor, suba una imagen. Esta no debe tener un tamaño superior a 2 MB.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Subir fichero</button>
                </form>

        </div>
    </div>


</div>

@endsection

