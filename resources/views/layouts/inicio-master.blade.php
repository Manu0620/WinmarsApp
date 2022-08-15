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
        <link rel="stylesheet" href="{{ url('assets/css/Nunito-Sans.css') }}" >
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                font-family: 'Nunito Sans';
                box-sizing: border-box;
            }

            img{
                width: 150px;
                image-rendering: pixelated;
            }

            body{
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
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 980px;
                animation: bg 40s infinite;
                background: url("assets/img/search_section/search-image1.jpg"); 
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

            .search-form{
                margin: 60px;
            }

            .radio-buttons{
                border: 1px solid #eee;
                border-radius: 30px; 
                padding: 20px;
                font-weight: bold;
                width: fit-content;
                margin: 0;
            }

            .radio-comprar, .radio-alquilar{
                visibility: hidden;
            }

            .radio-body{
                padding: 15px;
                padding-right: 25px;
            }

            .radio-body:hover, .radio-body:hover{
                background: #38b000;
                cursor: pointer;
                border-radius: 30px; 
                box-shadow: 0px 5px 10px #38b00064;
                color: white;
            }

            .radio-body span + input[type="radio"]:checked{
                background: #38b000;
                color: white;
            }

            .hero-title{
                color: black;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.656);
                font-weight: 900;
                text-align: center;
                animation: fadeIn 2s;
            }

            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }

            @keyframes bg {
                50% { 
                    background: url("assets/img/search_section/search-image2.jpg");
                    background-repeat: no-repeat; 
                    background-size: cover; 
                }
                100% { 
                    background: url("assets/img/search_section/search-image3.jpg");
                    background-repeat: no-repeat; 
                    background-size: cover; 
                }
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