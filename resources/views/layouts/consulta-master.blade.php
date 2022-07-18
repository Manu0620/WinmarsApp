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
                margin-top: 10%;
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
                margin: 30px; 
            }
            
            .tab-nav:hover{
                border-bottom: 4px solid #1976d2; 
                padding: 10px;
            }

            .container-fluid{
                width: 100%;
            }

            .table{
                font-weight: bold;
                margin: 30px;
                width: 96.5%;
            }

            .table thead{
                border-bottom: 2px solid black; 
            }

            .table th{
                white-space: nowrap;
                text-align: center;
                background: #64B5F6;
            }

            .table td{
                white-space: nowrap;
                text-align: center;
                background: #90CAF9;
                font-size: 14px;
            }

            .row{
                font-weight: 600;
                margin: 30px;
            }

            .container-fluid input, .container-fluid select, .container-fluid textarea{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
                border-radius: 10px;
            }

            .container-fluid input:hover, .container-fluid select:hover, .container-fluid textarea:hover{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .container-fluid input:focus, .container-fluid select:focus, .container-fluid textarea:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .button-group button, .table a, .button-group a{
                width: fit-content;
                height: 45px;
                margin: 20px 5px 20px 5px; 
                font-weight: bold;
                border-radius: 10px;
            }

            .btn{
                width: fit-content;
                font-weight: bold;
                border-radius: 10px;
            }

            .table .btn-editar{
                width: fit-content;
                margin: 5px;
                height: fit-content;
            }

            .button-group{
                text-align: right;
                margin-right: 30px;
            }

            h3{
                font-weight: bold;
                text-align: left;
                font-size: 30px;
                margin: 30px;
                margin-left: 60px;
            }
        </style>
    </head>

    <body>
        @auth
            @include('layouts.partials.navbar')
            
            <main class="container-fluid">
                @yield('content')
            </main>
            
        @endauth

        @guest
            <h3>Para ver el contenido <a href="/login">inicia sesion</a></h3>
        @endguest
        
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>