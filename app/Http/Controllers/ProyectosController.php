<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ProyectoCreado;
use PDF;
use Codedge\Fpdf\Fpdf\Fpdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProyectosExport;

class ProyectosController extends Controller
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
        $proyectos = Proyecto::all();

        return view("proyectos.listado", compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proyectos.creacion");
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
            'titulo' => ['required', 'min:3', 'max:10'],
            'descripcion' => ['required', 'min:3', 'max:255'],
            'etiquetas' => 'required'
        ]);

        $proyecto = Proyecto::create(
            request(['titulo', 'descripcion', 'etiquetas'])
        );

        Mail::to('diego@rodero.es')->send(
            new ProyectoCreado($proyecto)
        );

        return redirect('proyectos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto, Request $request)
    {
        return view("proyectos.mostrar", compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view("proyectos.edicion", compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto->titulo = request('titulo');
        $proyecto->descripcion = request('descripcion');
        $proyecto->etiquetas = request('etiquetas');

        $proyecto->save();

        return redirect('proyectos')->withExito('El proyecto se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect('proyectos');
    }

    public function pdf_html($id) {
        $proyecto = Proyecto::find($id);

        //return view('proyectos.pdf', compact("proyecto"));

        $pdf = PDF::loadView('proyectos.pdf', compact("proyecto"))->setPaper('a4', 'portrait');
        return $pdf->download('proyecto.pdf');
    }

    public function pdf() {
        $proyectos = Proyecto::all();

        $fpdf = new Fpdf();
        $fpdf->SetFont('Arial', 'B', 11);
        $fpdf->SetTextColor(0,0,0);

        $fila = 0;
        $col = 0;
        $x = 15;
        $y = 10;
        $separacion = 10;
        $inicio_texto = 14;

        $i = 0;

        $ancho = 85;
        $alto = 55;

        $fpdf->AddPage();

        foreach ($proyectos as $proyecto) {

            $ox = ($col == 0) ? 0 : $ancho + $separacion + 0;
            $oy = ($fila * ($alto + 0)) ;

            $fpdf->Image("http://apisa.com.es/dashboard/img/tarjeta_niños_back.png", $x + $ox, $y + $oy, $ancho, $alto);

            $fpdf->SetXY($x + $ox, $y + $oy + $inicio_texto);
            $fpdf->SetFont('Arial', 'B', 11);
            $fpdf->MultiCell($ancho, 20, utf8_decode($proyecto->titulo), 0, 'C');

            $fpdf->SetXY($x + $ox, $y + $oy + $inicio_texto + 6);
            $fpdf->SetFont('Arial', '', 11);
            $fpdf->MultiCell($ancho, 20, utf8_decode($proyecto->descripcion), 0, 'C');

            if($col == 0) {
                $col = 1;
            }
            else {
                $col = 0;
                $fila = $fila + 1;
            }

            if ($fila >= 5) {
                $fpdf->AddPage();
                $fila = 0;
                $col = 0;
            }
        }

        $fpdf->Output();
    }

    public function excel2() {
        $proyectos = Proyecto::all();

        $excel = Exporter::make('Excel');
        $excel->load($proyectos);

        return $excel->stream("proyectos.xlsx");
    }

    public function excel() {
        return Excel::download(new ProyectosExport, 'proyectos.xlsx');
    }
}
