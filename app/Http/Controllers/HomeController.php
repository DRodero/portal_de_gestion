<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function subir_ficheros() {
        return view('subir_ficheros');
    }

    public function subida() {
        request()->validate([
            'fileToUpload' => 'required|file|max:10000',
        ]);

        //Lo guarda con un nombre aleatorio
        request()->fileToUpload->store('logos');

        //Lo guarda con el nombre original del archivo
        $fileName =  request()->fileToUpload->getClientOriginalName();
        request()->fileToUpload->storeAs('logos',$fileName);

        return back()->with('exito','Tu imagen se ha subido correctamente.');
    }
}
