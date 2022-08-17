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

    <div class="contacto-fondo">
        <div class=" contacto-container">
            <div class="row">
                <div class="col-1">
                    <div class="icon-container">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Ubicación:</h4>
                    <p>Mía Molina, Av. Hispanoamericana Calle 1,<br>Santiago De Los Caballeros 51000</p>
                </div>
                <div class="col-1">
                    <div class="icon-container">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                </div>
                <div class="col">
                    <h4 style="font-weight: bold;">Teléfonos:</h4>
                    <p>(809) 889-2709, (809) 330-4140</p>
                </div>
                <div class="col-1" >
                    <div class="icon-container">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
                <div class="col" >
                    <h4 style="font-weight: bold;">Correos electrónicos:</h4>
                    <p>winmarsproperties@gmail.com<br>maderamanuel25@gmail.com</p>
                </div>
            </div>
    </div>
    
    </div>
    
@endsection