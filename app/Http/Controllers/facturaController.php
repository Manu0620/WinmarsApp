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
        $propiedades = propiedades::join('itbis','propiedades.citbis','=','itbis.citbis')
        ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
        ->get();
        return view('Facturacion', compact(['clientes', 'propiedades']));
    }

    public function query(){
        return view('consultarFacturas');
    }
}
