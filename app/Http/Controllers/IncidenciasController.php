<?php

namespace App\Http\Controllers;

use App\Incidencia;
use Illuminate\Http\Request;

class IncidenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::all();

        return view("incidencias.listado", compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("incidencias.creacion");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3', 'max:255'],
        ]);

        Incidencia::create(
            request(['proyecto_id', 'titulo', 'descripcion', 'cerrada'])
        );

        return redirect('incidencias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        return view("incidencias.mostrar", compact('incidencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        return view("incidencias.edicion", compact('incidencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        $incidencia->proyecto_id = request('proyecto_id');
        $incidencia->titulo = request('titulo');
        $incidencia->descripcion = request('descripcion');
        $incidencia->cerrada = request('cerrada') ?? "0";

        $incidencia->save();

        return redirect('incidencias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();

        return redirect('incidencias');
    }
}
