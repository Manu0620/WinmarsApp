<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Winmars Properties | Contacto</title>
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
            }

            body{
                width: 100%;
                margin-bottom: 5%;
            }

            .fila{

                background-color: #def7ec;
                margin-top: 5%;

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

            .section-image{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 500px;
                animation: bg 40s infinite;
                background: url("assets/img/nosotros/pexels-andrew-neel-2312369.jpg"); 
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

            .title{
                color: #edf2fb;
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.656);
                font-weight: 900;
                text-align: center;
                animation: fadeIn 2s;
            }

            .titulo {
                text-align: left;
                font-size: 20px;
            }

            .texto-nosotros{
                font-weight: 300px;
                font-size: 14px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .img1{
                width: 100%;
            }

           

            .row-mapa{
                margin-top: 50px;
            }

            iframe{
                width: 100%;
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