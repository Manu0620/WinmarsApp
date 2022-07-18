<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cotizacionController extends Controller
{
    public function show(){
        
        return view('Cotizacion');
    }

    public function create(Request $request){

        return redirect()->to('Cotizacion')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        return view('consultarCotizaciones');
    }
}
