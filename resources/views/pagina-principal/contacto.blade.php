@extends('layouts.contacto-master')

@section('content')
  <div class="section-image">  
      <div class="title">
          <h1><b>Contacto</b></h1>
      </div>
  </div>

  <div class="contacto-form">
      <div class="row row-mapa">

        <div class="col">
        
        </div>

        <div class="col" style="margin: 40px;">
          <h1 class="fw-300 titulo">Nuestra Ubicación:</h1>
          <iframe style="border-radius: 25px; opacity: 0.8; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.208); filter: grayscale(100%) invert(92%) contrast(83%);" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.9579453698666!2d-70.65492788561819!3d19.414222946299994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1cf62c72bf7b9%3A0xece9b96e03eb72a9!2sWinmars%20Properties!5e0!3m2!1ses!2sdo!4v1660703331998!5m2!1ses!2sdo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

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


@endsection