<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\itbis;
use App\Models\propiedades;
use Illuminate\Http\Request;

class facturaController extends Controller
{
    public function create(){
        $clientes = clientes::all();
        $propiedades = propiedades::all();
        return view('Facturacion', compact(['clientes', 'propiedades']));
    }

    public function query(){
        return view('consultarFacturas');
    }
}
