<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function show(){
        if(Auth::check()){
            return redirect()->to('/home');
        }
        return view('auth.login');
    }

    public function login(loginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('Nombre de usuario y/o contraseña son incorrectos, Intente de nuevo!');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        $status = $user->status;
        if($status == 'inactivo'){
            return redirect()->to('/login')->withErrors('Este usuario fue inhabilitado!');
        }

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user){  
        return redirect()->to('/home')->with('success');
    }
}