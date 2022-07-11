<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class clienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nomcli' => 'required|string', 
            'apecli' => 'required|string', 
            'tecli1' => 'required|integer|unique:clientes,tecli1', 
            'tecli2' => 'integer|unique:clientes,tecli2|nullable', 
            'dircli' => 'required', 
            'corcli' => 'required|string|unique:clientes,corcli',
            'cedrnc' => 'required|integer|unique:clientes,cedrnc', 
            'codtpcli' => 'required',
            'estcli' => 'required',
        ];
    }
}
