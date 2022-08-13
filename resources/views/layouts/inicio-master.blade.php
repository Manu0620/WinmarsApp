<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Winmars Properties | Venta, alquiler y administracion de Propiedades</title>
        <link rel="icon" href="assets/img/Solo_logo.png">

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!--Fonts-->
        <link rel="stylesheet" href="{{ url('assets/css/font-nunito.css') }}" >
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                font-family: 'Nunito', sans-serif;
                box-sizing: border-box;
            }

            img{
                width: 150px;
                image-rendering: pixelated;
            }

            body{
                display: grid;
                grid-template-columns: 1fr;
                width: 100%;
                margin-bottom: 5%;
            }

            .container-fluid{
                padding: 0;
            }

            ::-webkit-scrollbar{
                background: white;
                width: 8px;
            }

            ::-webkit-scrollbar-button{
                display: none;
            }

            ::-webkit-scrollbar-thumb{
                background: #38b00090;
                border-radius: 10px;
            }

            .section-searh-box{
                width: 100%;
                height: 980px;
                background: url("assets/img/search-image.jpg");
                background-repeat: no-repeat; 
                background-size: cover;
            }

            .search-box{
                background: white;
                width: 50%;
                height: 400px;
                border-radius: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.208);
            }

            .search-box .row{
                margin: 20px 0 20px 0;
            }

        </style>
    </head>

    <body>
        <header>
            @include('layouts.partials.navbarClientes')
        </header>
        <main class="container-fluid">
            @yield('content')
        </main>
    </body>

</html>