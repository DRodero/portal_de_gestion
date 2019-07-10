@component('mail::message')
# Proyecto Creado: {{ $proyecto->titulo }}

La descripción del proyecto es:<br>

{{ $proyecto->descripcion }}

@component('mail::button', ['url' => '/proyectos/' . $proyecto->id ])
Ver proyecto
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
