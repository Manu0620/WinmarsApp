<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class propiedadesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required',
            'descrip' => 'required',
            'direccion' => 'required',
            'municipio' => 'required|regex:/^[a-zA-Z]+$/u',
            'ciudad' => 'required|regex:/^[a-zA-Z]+$/u',
            'fotos' => 'required',
            'habit' => 'required|integer',
            'baños' => 'required|integer',
            'metros' => 'required|integer',
            'parqueo' => 'required|integer',
            'preven' => 'nullable|numeric',
            'preren' => 'nullable|numeric',
            'comision' => 'required|integer',
            'codcli' => 'required',
            'codtpro' => 'required',
            'citbis' => 'required',
            'estpro' => 'required',
        ];
    }
}
