<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reportesController extends Controller
{
    public function imprimirFactura()
    {
        return view('reportes.reporteFactura');
    }

    public function imprimirCotizacion()
    {
        return view('reportes.reporteCotizacion');
    }
}
