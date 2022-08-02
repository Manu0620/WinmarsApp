@extends('layouts.home-master')

@section('content')
  @auth
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background: #1976D2; color: white; border-radius: 10px;">
            <div class="inner">
              <h3>5</h3>

              <p>Citas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background: #1E88E5; color: white; border-radius: 10px;">
            <div class="inner">
              <h3>10<sup style="font-size: 20px"></sup></h3>

              <p>Solicitud sin contestar</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-code-pull-request"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box" style="background: #2196F3; color: white; border-radius: 10px;">
            <div class="inner">
              <h3>15</h3>

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
          <div class="small-box" style="background: #42A5F5; color: white; border-radius: 10px;">
            <div class="inner">
              <h3>50</h3>

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
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div>
            <canvas id="myChart"></canvas>
          </div>  
          
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
          {{-- SCRIPT DEL GRAFICO --}}
          <script>
            const labels = [
              'January',
              'February',
              'March',
              'April',
              'May',
              'June',
            ];
          
            const data = {
              labels: labels,
              datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
              }]
            };
          
            const config = {
              type: 'line',
              data: data,
              options: {}
            };
          </script>
    
          <script>
            const myChart = new Chart(
              document.getElementById('myChart'),
              config
            );
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