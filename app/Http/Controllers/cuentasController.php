<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cuentasController extends Controller
{

    public function query(){
        return view('consultarCuentas');
    }
}
