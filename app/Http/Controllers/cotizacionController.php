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
    public function create(){
        $clientes = clientes::where('codtpcli','1')->where('estcli', 'activo')->get();
        $propiedades = propiedades::join('itbis','propiedades.citbis','=','itbis.citbis')
        ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
        ->where('propiedades.estpro','activo')->get();
        $tipo_clientes = tipo_clientes::all();
        return view('Cotizacion', compact(['clientes', 'propiedades', 'tipo_clientes']));
    }

    public function save(cotizacionRequest $request){
        
        $cotizacion = new cotizaciones();

        $cotizacion->codcli = $request->codcli;
        $cotizacion->codusu = Auth::user()->id;
        $cotizacion->condicion = $request->condicion;
        $cotizacion->subtot = $request->subtot;
        $cotizacion->total = $request->total;
        $cotizacion->fecvenc = date("Y-m-d h:i",strtotime(date("Y-m-d h:i")."+ 30 days"));
        $cotizacion->observaciones = $request->observaciones;
        if($request->condicion == 'Credito'){
            $cotizacion->estcot = 'Pendiente';
        }else{ $cotizacion->estcot = 'Completada'; }
        $cotizacion->save();
        $numcot = $cotizacion->numcot;

        $condicion = $request->condicion;

        $detalle = new detalle_cotizacion();

        $detalle->numcot = $numcot;
        $detalle->codpro = $request->codpro;
        $detalle->concepto = $request->concepto;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio = $request->total;
        if($request->condicion == 'Credito'){
            $detalle->estcot = 'Pendiente';
        }else{ $detalle->estcot = 'Completada'; }
        $detalle->save();

        /*$cuentas = new cuentas();

        if(is_null(cuentas::where('codcli', $request->codcli)->get()) && $condicion == 'Credito'){
            $cuentas->codcli = $request->codcli;
            $cuentas->numcot = $numcot;
            $cuentas->balance = $request->total;
            $cuentas->totpag = 0;
            $cuentas->balpend = $request->total;
            $cuentas->save();
        }else if($condicion == 'Credito'){
            $cuenta = cuentas::where('codcli', $request->codcli)->get();
            $balance = $cuenta->balance;
            $balpend = $cuenta->balpend;
            $cuenta->balance = $balance+$request->total;
            $cuenta->balpend = $balpend+$request->total;
            $cuenta->save();
        }*/

        return redirect()->to('Cotizacion')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
       
    }
}