<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    public function inicio()
    {
        return view('pagina-principal.inicio');
    }

    public function venderView()
    {
        return view('pagina-principal.vender');
    }
}
