<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class empleadosRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
        'nomemp'=>'required|string',
        'apeemp'=>'required|string',
        'telem1'=>'required|numeric|digits:10|unique:empleados,telem1|starts_with:809,829,849',
        'telem2'=>'nullable|numeric|digits:10|unique:empleados,telem2|starts_with:809,829,849',
        'direccion'=>'required',
        'correo'=>'required|unique:empleados,correo|email',
        'cedula'=>'required|integer|digits:11|unique:empleados,cedula|starts_with:402,031',
        'ctipemp'=>'required|integer',
        'codpos'=>'required|integer',
        'estemp'=>'required',
        ];
    }

}
