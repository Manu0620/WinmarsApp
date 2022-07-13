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
        'telem1'=>'required|integer|unique:empleados,telem1',
        'telem2'=>'nullable|integer|unique:empleados,telem2',
        'direccion'=>'required',
        'correo'=>'required|unique:empleados,correo',
        'cedula'=>'required|integer|unique:empleados,cedula',
        'ctipemp'=>'required|integer',
        'codpos'=>'required|integer',
        'estemp'=>'required',
        ];
    }
}
