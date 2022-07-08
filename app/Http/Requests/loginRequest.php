<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class loginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nomusu' => 'required',
            'contus' => 'required'
        ];
    }

    public function getCredentials(){
        $username = $this->get('nomusu');

        if($this->isEmail($username)){
            return[
                'correo' => $username,
                'contus' => $this->get('contus')
            ];
        }

        return $this->only('nomusu', 'contus');
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['nomusu' => $value], ['nomusu' => 'email'])->fails();
    }
}
