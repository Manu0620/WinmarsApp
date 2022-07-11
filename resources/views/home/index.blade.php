@extends('layouts.home-master')

@section('content')

    <h1>Dashboard</h1>
    
    @auth
        <p>Bienvenido {{auth()->user()->username}}, estas autenticado a la pagina</p>
        <p>
            <a href="/logout">Logout</a>
        </p>
    @endauth

    @guest
        <p>Para ver el contenido <a href="/login">inicia sesion</a></p>
    @endguest

@endsection