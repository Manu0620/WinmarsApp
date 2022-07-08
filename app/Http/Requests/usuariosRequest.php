<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuariosRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codemp' => 'required|unique:usuarios,codemp', 
            'nomusu' => 'required|unique:usuarios,nomusu', 
            'contus' => 'required|min:8', 
            'confirmacion_contus' => 'required|same:contus', 
            'correo' => 'required|unique:usuarios,correo', 
            'roles' => 'required', 
            'estusu' => 'required', 
        ];
    }
}
