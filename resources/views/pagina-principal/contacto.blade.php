@extends('layouts.contacto-master')

@section('content')
<div class="section-image">  
    <div class="title">
        <h1><b>Contacto</b></h1>
    </div>
</div>

<div class="container">
  <div class="row fila">
    <div class="col-1 iconos">
      <span><i class="fa-solid fa-location-dot"></i></span>
    </div>
    <div class="col-3 texto-nosotros">
      <h1 class="fw-300 titulo">Ubicación:</h1>
      <p>Mía Molina, Av. Hispanoamericana Calle 1,
        <br>Santiago De Los Caballeros 51000
      </p>
    </div>

    <div class="col-1 iconos">
      <span><i class="fa-solid fa-location-dot"></i></span>
    </div>
    <div class="col-3 texto-nosotros">
      <h1 class="fw-300 titulo">Teléfono:</h1>
     <ul>
      <li>(809) 889-2709</li>
      <li>(829) 330-4140</li>
     </ul>
    </div>

    <div class="col-1 iconos">
      <span><i class="fa-solid fa-location-dot"></i></span>
    </div>
    <div class="col-3 texto-nosotros">
      <h1 class="fw-300 titulo">Correo Electrónico:</h1>
      <ul>
        <li>winmarsproperties@gmail.com</li>
        <li>ventaswmp@gmail.com</li>
       </ul>
    </div>

  </div>

    <div class="row row-mapa">
      <div class="col-2">
    </div>

    <div class="col-8">
        <h1 class="fw-300 titulo">Nuestra Ubicación:</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.9579453698666!2d-70.65492788561819!3d19.414222946299994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1cf62c72bf7b9%3A0xece9b96e03eb72a9!2sWinmars%20Properties!5e0!3m2!1ses!2sdo!4v1660703331998!5m2!1ses!2sdo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="col-2">
    </div>

  </div>




@endsection