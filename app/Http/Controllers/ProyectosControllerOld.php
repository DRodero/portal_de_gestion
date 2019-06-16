<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;

class ProyectosControllerOld extends Controller
{
    public function index() {
        $proyectos = Proyecto::all();

        return view("proyectos.listado", compact('proyectos'));
    }

    public function create() {
        return view("proyectos.creacion");
    }

    public function store() {
        $proyecto = new Proyecto();

        $proyecto->titulo = request('titulo');
        $proyecto->descripcion = request('descripcion');

        $proyecto->save();

        return redirect('proyectos');
    }

    public function update($proyecto) {

    }

    public function destroy($proyecto) {

    }

    public function edit($proyecto) {

    }

    public function show($proyecto) {

    }



}
