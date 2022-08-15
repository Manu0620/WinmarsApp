@extends('layouts.inicio-master')


@section('content')    
    <div class="section-searh-box">  
        <div class="hero-title">
            <h1>¡Tenemos el inmueble que buscas!</h1>
        </div>
        <div class="search-box">
            <form class="search-form">
                <div class="radio-buttons">
                    <span class="radio-body">
                        <input type="radio" class="radio-comprar" value="Comprar" selected>Comprar
                    </span> 
                    <span class="radio-body">
                        <input type="radio" class="radio-alquilar" value="Alquilar" selected>Alquilar
                    </span> 
                </div>
            </form>
        </div> 
    </div>
    
@endsection