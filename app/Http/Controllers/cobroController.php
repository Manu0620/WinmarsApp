<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cobroController extends Controller
{
    public function show(){
        
        return view('Cobros');
    }

    public function create(Request $request){

        return redirect()->to('Cobros')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        return view('consultarCobros');
    }
}
