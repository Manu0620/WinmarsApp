<?php

namespace App\Http\Controllers;

use App\Models\cuentas;
use Illuminate\Http\Request;

class cuentasController extends Controller
{

    public function query(){
        $cuentas = cuentas::all();
        return view('consultarCuentas', compact('cuentas'));
    }
}
