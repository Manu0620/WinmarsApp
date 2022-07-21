<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="assets/img/Solo logo.png">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
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

            .container-fluid{
                width: 100%;
            }

            textarea{
                background-color: transparent;
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

            .table{
                width: 96.5%;
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 20px rgba( 0, 0, 0, 0.15)
            }

            .table thead tr{
                background-color: #1E88E5;
                color: white;  
                font-weight: bold;  
                text-align: left;
                white-space: nowrap;
            }

            .table th,
            .table td{
                padding: 12px 15px;
            }

            .table tbody td{    
                background-color: #64B5F6;
                border-bottom: 1px solid #ffffff66;
                font-size: 0.9em;
                font-weight: 600;
                text-align: left;
                white-space: nowrap;
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

            td li{
                height: 35px;
                border-radius: 30px;
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