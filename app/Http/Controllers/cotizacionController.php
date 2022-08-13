<?php

namespace App\Http\Controllers;

use App\Http\Requests\cotizacionRequest;
use App\Models\clientes;
use App\Models\detalle_cotizacion;
use App\Models\cotizaciones;
use App\Models\propiedades;
use App\Models\tipo_clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cotizacionController extends Controller
{
    public function create()
    {
        $clientes = clientes::where('codtpcli', '1')->where('estcli', 'activo')->get();
        $propiedades = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
            ->where('propiedades.estpro', 'activo')->get();
        $tipo_clientes = tipo_clientes::all();
        return view('cotizaciones.Cotizacion', compact(['clientes', 'propiedades', 'tipo_clientes']));
    }

    public function save(cotizacionRequest $request)
    {

        $contizacion = new cotizaciones();

        $contizacion->codcli = $request->codcli;
        $contizacion->codusu = Auth::user()->id;
        $contizacion->subtot = priceToFloat($request->subtot);
        $contizacion->total = priceToFloat($request->total);
        $contizacion->fecvenc = date("Y-m-d h:i", strtotime(date("Y-m-d h:i") . "+ 30 days"));
        $contizacion->observaciones = $request->observaciones;
        $contizacion->estcot = 'Pendiente';
        $contizacion->save();
        $numcot = $contizacion->numcot;

        $detalle = new detalle_cotizacion();

        $detalle->numcot = $numcot;
        $detalle->codpro = $request->codpro;
        $detalle->concepto = $request->concepto;
        $detalle->condicion = $request->condicion;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio = priceToFloat($request->subtot);
        $detalle->estcot = 'Pendiente';
        $detalle->save();

        return redirect()->to('Cotizacion')->with('success', 'Formulario enviado correctamente!');
    }

    public function query()
    {
    }
}
