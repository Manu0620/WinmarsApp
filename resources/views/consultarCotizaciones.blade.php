@extends('layouts.consulta-master')
<title>Consultar Contizaciones</title>

@php
    $rol = auth()->user()->rol;
@endphp

@section('content')

@if($rol == 'Administrador' || $rol == 'Usuario')
    

@else
    <h3>No puede acceder a esta pagina, retornar a <a href="/home">Home</a></h3>
@endif

@endsection