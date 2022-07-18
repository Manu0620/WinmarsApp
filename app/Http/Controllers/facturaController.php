<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\cuentas;
use App\Models\detalle_factura;
use App\Models\facturas;
use App\Models\itbis;
use App\Models\propiedades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class facturaController extends Controller
{
    public function create(){
        $clientes = clientes::all();
        $propiedades = propiedades::join('itbis','propiedades.citbis','=','itbis.citbis')
        ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
        ->get();
        return view('Facturacion', compact(['clientes', 'propiedades']));
    }

    public function save(Request $request){
        $facturas = new facturas();
        $cuentas = new cuentas();
        $detalle = new detalle_factura();

        $facturas->codcli = $request->codcli;
        $facturas->codusu = Auth::user()->id;
        $facturas->condicion = $request->condicion;
        $facturas->subtot = $request->subtot;
        $facturas->total = $request->total;
        $facturas->fecvenc = date("d-m-Y",strtotime($request->fecha."+ 30 days"));
        $facturas->observaciones = $request->observaciones;
        if($request->condicion == 'Credito'){
            $facturas->estfac = 'Pendiente';
        }else{ $facturas->estfac = 'Completada'; }
        $facturas->save();
        $numfac = $facturas->numfac;

        $concepto = $request->concepto;
        $cantidad = $request->cantidad;

        if($concepto == 'Alquiler' && $cantidad > 1){
            for ($i = 1; $i < $cantidad ; $i++) {
                $detalle->numfac = $numfac;
                $detalle->codpro = $request->codpro;
                $detalle->concepto = $request->concepto;
                $detalle->cantidad = 1;
                if($request->condicion == 'Credito'){
                    $detalle->precio = $request->precio/$cantidad;
                    $detalle->estfac = 'Pendiente';
                }else{ $detalle->estfac = 'Completada'; }
                $detalle->save();
            }
        }else{
            $detalle->numfac = $numfac;
            $detalle->codpro = $request->codpro;
            $detalle->concepto = $request->concepto;
            $detalle->cantidad = 1;
            $detalle->precio = $request->precio;
            if($request->condicion == 'Credito'){
                $detalle->estfac = 'Pendiente';
            }else{ $detalle->estfac = 'Completada'; }
            $detalle->save();
        }

        $condicion = $request->condicion;
        if(is_null(cuentas::where('codcli', $request->codcli)->get()) && $condicion == 'Credito'){
            $cuentas->codcli = $request->codcli;
            $cuentas->numfac = $numfac;
            $cuentas->balance = $request->total;
            $cuentas->balpend = $request->total;
            $cuentas->save();
        }else if($condicion == 'Credito'){
            $cuenta = cuentas::where('codcli', $request->codcli)->get();
            $cuenta->balance = $cuenta->balance+$request->total;
            $cuenta->balpend = $cuenta->balpend+$request->total;
            $cuenta->save();
        }

        return redirect()->to('Facturacion')->with('success', 'Formulario enviado correctamente!');
    }

    public function query(){
        return view('consultarFacturas');
    }
}
