<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'tecli1' => 'required|numeric|digits:10|unique:clientes,tecli1|starts_with:809,829,849',
            'tecli2' => 'nullable|numeric|digits:10|unique:clientes,tecli2|starts_with:809,829,849',
            'dircli' => 'required', 
            'corcli' => 'required|string|unique:clientes,corcli|email',
            'cedrnc' => 'required|integer|digits:11|unique:clientes,cedrnc|starts_with:402,031',
            'codtpcli' => 'required',
            'estcli' => 'required',
        ];
    }

}
