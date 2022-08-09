@extends('layouts.home-master')

@php
    use App\Models\citas;  
    use App\Models\solicitudes;
    use App\Models\facturas;
    $numeroCitas = citas::where('estcit', 'Pendiente')->count();
    $numeroSolicitudes = solicitudes::where('estsol', 'Pendiente')->count();
    $numeroFacturas = facturas::where('estfac', 'Pendiente')->count();
@endphp

@section('content')
  @auth
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroCitas }}</h3>
              <p>Citas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-calendar-check"></i>
            </div>
            <a href="/consultarCitas" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroSolicitudes }}</h3>
              <p>Solicitudes de cita pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-code-pull-request"></i>
            </div>
            <a href="/consultarSolicitudes" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>{{ $numeroFacturas }}</h3>
              <p>Facturas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box">
            <div class="inner">
              <h3>0</h3>
              <p>Propiedades vendidas</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-building"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ventas</h3>
          <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-primary" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          
          <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
          <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    
          {{-- SCRIPT DEL GRAFICO --}}
          <script>
            window.onload = function () {

              var options = {
                animationEnabled: true,  
                title:{
                  text: "Monthly Sales - 2017"
                },
                axisX: {
                  valueFormatString: "MMM"
                },
                axisY: {
                  title: "Sales (in USD)",
                  prefix: "$"
                },
                data: [{
                  yValueFormatString: "$#,###",
                  xValueFormatString: "MMMM",
                  type: "spline",
                  dataPoints: [
                    { x: new Date(2017, 0), y: 25060 },
                    { x: new Date(2017, 1), y: 27980 },
                    { x: new Date(2017, 2), y: 33800 },
                    { x: new Date(2017, 3), y: 49400 },
                    { x: new Date(2017, 4), y: 40260 },
                    { x: new Date(2017, 5), y: 33900 },
                    { x: new Date(2017, 6), y: 48000 },
                    { x: new Date(2017, 7), y: 31500 },
                    { x: new Date(2017, 8), y: 32300 },
                    { x: new Date(2017, 9), y: 42000 },
                    { x: new Date(2017, 10), y: 52160 },
                    { x: new Date(2017, 11), y: 49400 }
                  ]
                }]
              };
              $("#chartContainer").CanvasJSChart(options);
            }
          </script>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    @endauth

    @guest
        <p>Para ver el contenido <a href="/login">inicia sesion</a></p>
    @endguest

@endsection