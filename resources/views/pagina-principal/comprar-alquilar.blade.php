@extends('layouts.inicio-master')

@php
    Use App\Models\propiedades;
    Use App\Models\imagenes;
    $propiedades = propiedades::all();
@endphp

@section('content')
    <div class="row" style="height: 80px; width:100%; background:#e3f2fd; margin-top: 100px;">
        <div class="col">
            <h3 id="registros">Resultados encontrados:</h3>
        </div>
        <div class="col">

        </div>
    </div>

    <div class="row" style="display:flex; justify-content:center; width: 90%; margin: 40px; ">
        @if(!is_null($peticion))
        @foreach($propiedades as $propiedad)
        @php
            $thumbnail = imagenes::where('codpro', $propiedad->codpro)->first();
        @endphp
        <div class="property" style=" width:fit-content; margin: 20px; padding: 0; backgroud: white;">
            <div class="propiedad-image">
                <img  style="border: 3px solid #0466c8; border-radius: 35px; width: 350px; height: 200px;" src="{{ url($thumbnail->url) }}" alt="property-image">
            </div>
            <h5 style="text-align:left; font-weight: bold; font-size: 16px; margin-top: 10px; margin-left: 20px;">{{ $propiedad->titulo }}</h5>
            <p style="color:#0466c8; text-align:left; font-weight: bold; font-size: 24px; margin-left:20px; margin-bottom: 5px;">{{ 'US$'. number_format($propiedad->preven, 0, '.', ',') }}</p>
            <ul style=" padding:0; display:flex; list-style-type: none; text-align: left; font-weight: 600; color:#0466c8;" >
                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bed"></i> {{ $propiedad->habit }}</li>
                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-bath"></i> {{ $propiedad->baños }}</li>
                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-car"></i> {{ $propiedad->parqueo }}</li> 
                <li style="margin: 0 0 0 20px;"><i class="fa-solid fa-map"></i> {{ $propiedad->metros. " M²" }}</li>
            </ul>
        </div>
        @endforeach
    @endif
    </div>

    <div class="contacto-fondo">
        <div class=" contacto-container">
            <div class="row" style="padding: 20px; ">
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
                    <p>
                        <a style="text-decoration: none; color:#0466c8;" href="https://api.whatsapp.com/send?phone=18498652406"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a><br/>
                        <a style="text-decoration: none; color:#0466c8;" href="tel:8293304140"><i class="fa-solid fa-phone"></i> (829) 330-4140 </a>
                    </p>
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
    
@endsection