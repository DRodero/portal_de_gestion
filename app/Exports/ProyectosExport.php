<?php

namespace App\Exports;

use App\Proyecto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProyectosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Proyecto::all();
    }
}
