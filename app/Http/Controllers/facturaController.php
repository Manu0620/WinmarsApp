<?php

namespace App\Http\Controllers;

use App\Http\Requests\facturaRequest;
use App\Models\clientes;
use App\Models\cuentas;
use App\Models\detalle_factura;
use App\Models\facturas;
use App\Models\propiedades;
use App\Models\tipo_clientes;
use Illuminate\Support\Facades\Auth;

class facturaController extends Controller
{
    public function create()
    {
        //para las facturas
        $clientes = clientes::where('codtpcli', '1')->where('estcli', 'activo')->get();
        $propiedades = propiedades::join('itbis', 'propiedades.citbis', '=', 'itbis.citbis')
            ->select('itbis.itbis', 'propiedades.codpro', 'propiedades.titulo', 'propiedades.preven', 'propiedades.preren')
            ->where('propiedades.estpro', 'activo')->get();
        $tipo_clientes = tipo_clientes::all();
        $numfac1 = facturas::select('numfac')->orderBy('numfac', 'desc')->first();

        return view('facturas.Facturacion', compact(['clientes', 'propiedades', 'tipo_clientes','numfac1']));
    }

    public function save(facturaRequest $request)
    {
        $facturas = new facturas();

        $facturas->codcli = $request->codcli;
        $facturas->codusu = Auth::user()->id;
        $facturas->condicion = $request->condicion;
        $facturas->subtot = priceToFloat($request->subtot);
        $facturas->total = priceToFloat($request->total);
        $facturas->fecvenc = date("Y-m-d h:i", strtotime(date("Y-m-d h:i") . "+ 30 days"));
        $facturas->observaciones = $request->observaciones;
        $facturas->estfac = 'Pendiente';
        $facturas->save();
        $numfac = $facturas->numfac;

        $condicion = $request->condicion;

        $detalle = new detalle_factura();

        $detalle->numfac = $numfac;
        $detalle->codpro = $request->codpro;
        $detalle->concepto = $request->concepto;
        $detalle->cantidad = $request->cantidad;
        $detalle->precio = priceToFloat($request->subtot);
        if ($request->condicion == 'Financiamiento') {
            $detalle->estfac = 'Pendiente';
        } else {
            $detalle->estfac = 'Completada';
        }
        $detalle->save();

        $codcli = $request->codcli;

        $cuenta = cuentas::where('codcli', $codcli)->first();
        $cuentas = new cuentas();

        if (is_null($cuenta) && $condicion == 'Financiamiento') {
            $cuentas->codcli = $codcli;
            $cuentas->balance = priceToFloat($request->total);
            $cuentas->totpag = 0;
            $cuentas->balpend = priceToFloat($request->total);
            $cuentas->estcue = 'Pendiente';
            $cuentas->save();
        } else if ($condicion == 'Financiamiento') {
            $cuenta->balance = priceToFloat($cuenta->balance) + priceToFloat($request->total);
            $cuenta->balpend = priceToFloat($cuenta->balpend) + priceToFloat($request->total);
            $cuenta->estcue = 'Pendiente';
            $cuenta->save();
        }

        $propiedad = propiedades::find($request->codpro);
        $propiedad->estpro = 'Vendida';
        $propiedad->save();

        $cliente = clientes::find($codcli);

        return redirect()->to('Facturacion')->with('success', 'Formulario enviado correctamente!');
    }

    public function query()
    {
        return view('facturas.consultarFacturas');
    }
}

function priceToFloat($s)
{
    // is negative number
    $neg = strpos((string)$s, '-') !== false;

    // convert "," to "."
    $s = str_replace(',', '.', $s);

    // remove everything except numbers and dot "."
    $s = preg_replace("/[^0-9\.]/", "", $s);

    // remove all seperators from first part and keep the end
    $s = str_replace('.', '', substr($s, 0, -3)) . substr($s, -3);

    // Set negative number
    if ($neg) {
        $s = '-' . $s;
    }

    // return float
    return (float) $s;
}
