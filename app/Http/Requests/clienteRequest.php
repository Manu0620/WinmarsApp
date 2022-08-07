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
        $rules = [
            'nomcli' => 'required|string',
            'apecli' => 'required|string',
            'tecli1' => 'required|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli1,' . $this->get('codcli') . ',codcli',
            'tecli2' => 'nullable|numeric|digits:10|starts_with:809,829,849|unique:clientes,tecli2,' . $this->get('codcli') . ',codcli',
            'dircli' => 'required',
            'corcli' => 'required|string|email|unique:clientes,corcli,' . $this->get('codcli') . ',codcli',
            'cedrnc' => 'required|numeric|digits:11|starts_with:402,031|unique:clientes,cedrnc,' . $this->get('codcli') . ',codcli',
            'codtpcli' => 'required|integer',
            'estcli' => 'required',
        ];

        return $rules;
    }
}
