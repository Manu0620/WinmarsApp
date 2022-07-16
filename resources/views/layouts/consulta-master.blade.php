<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="assets/img/Solo logo.png">

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                font-family: 'Nunito', sans-serif;
            }

            img{
                width: 150px;
                image-rendering: pixelated;
            }

            body{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: auto;
            }


            textarea{
                background: transparent;
                border: none;
            }

            .tab-nav a:visited,.tab-nav a:link,.tab-nav a:active{
                text-decoration: none;
                color: #1976d2;
            }

            .tab-nav{
                border-bottom: 4px solid #6c757d;  
                border-radius: 5px;
                font-weight: bold;
                padding: 10px;
                margin-bottom: 30px; 
            }
            
            .tab-nav:hover{
                border-bottom: 4px solid #1976d2; 
                padding: 10px;
            }

            .container{
                width: 100%;
                margin: 50px;
            }

            table{
                font-weight: bold;
            }

            thead{
                border-bottom: 2px solid black; 
            }

            .container th{
                background: #64B5F6;
            }

            .container td{
                background: #90CAF9;
                font-size: 14px;
            }

            .container input{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
                border-radius: 10px;
                background: #90CAF9;
            }

            .container input:hover{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .container input:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
                background: #90CAF9;
            }

            .container button, .container a{
                width: fit-content;
                height: 45px;
                margin: 20px 5px 20px 5px; 
                font-weight: bold;
                border-radius: 10px;
            }

            .container .btn-editar, .container .btn-eliminar{
                width: fit-content;
                margin: 5px;
                height: fit-content;
            }

            .button-group{
                text-align: right;
            }

            h3{
                font-weight: bold;
                text-align: left;
                margin: 30px;
            }
        </style>
    </head>

    <body>
        @auth
            @include('layouts.partials.navbar')

            <main class="container">
                @yield('content')
            </main>
            
        @endauth

        @guest
            <h3>Para ver el contenido <a href="/login">inicia sesion</a></h3>
        @endguest
        
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>