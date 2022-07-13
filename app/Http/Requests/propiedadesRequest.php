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
            'fotos' => 'nullable',
            'habit' => 'required|integer',
            'baños' => 'required|integer',
            'metros' => 'required|integer',
            'parqueo' => 'required|integer',
            'preven' => 'required|numeric',
            'preren' => 'required|numeric',
            'comision' => 'required|integer',
            'codcli' => 'required',
            'codtppro' => 'required',
            'citbis' => 'required',
            'estpro' => 'required',
        ];
    }
}
