<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidenciasController extends Controller
{
    public function listado_pendientes() {
        $incidencias = [
            'Primera incidencia',
            'Segunda incidencia',
            'Tercera incidencia'
        ];

        return view('incidencias.listado_pendientes', compact('incidencias'));
    }

    public function listado_todas() {
        return view('incidencias.listado_todas');
    }

    public function listado_creacion() {
        return view('incidencias.listado_creacion');
    }

    public function listado_gestion() {
        return view('incidencias.listado_gestion');
    }
}
