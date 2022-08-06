<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="assets/img/Solo logo.png">
        
        <!--JavaScript-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.25/dist/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>      
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
                margin-bottom: 5%;
            }

            .footer{
                display: flex;
                font-weight: bold;
                background: #E3F2FD;
                justify-content: center;
                height: 50px;
                width: 100%;
            }

            .rights, .date{
                line-height: 50px;
            }

            .date{
                position: absolute;
                right: 20px;
            }

            .container-fluid{
                width: 100%;
            }

            .modal-content{
                border-radius: 12px;
                background: #E3F2FD;
            }

            .modal-body{
                padding: 40px 80px 40px 80px;
            }

            .modal-header button{
                border: none;
                color: white;
                width: 200px;
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
                border-radius: 5px;
                font-weight: bold;
                padding: 10px;
                margin-bottom: 30px; 
            }
            
            .tab-nav:hover{
                padding: 10px;
            }

            .table{
                width: 100%;
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                min-width: 400px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 20px rgba( 0, 0, 0, 0.15);
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

            form .row{
                font-weight: 600;
                margin: 30px;
                margin-top: 0px;
            }

            form .row input{
                height: 40px;
            }

            .dataTables_paginate .pagination li{
                height: 40px;
                font-weight: bold;
            }

            .container-fluid input, .container-fluid select, .container-fluid textarea, .input-group-text{
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

            label{
                font-weight: 600;
            }

            .input-group-text{
                height: 40px;
                color: #0ead69;
                font-weight: bold;
            }

            .button-group button, .table a, .button-group a{
                border: none;
                width: fit-content;
                height: 45px;
                margin: 20px 5px 20px 5px; 
                font-weight: bold;
                border-radius: 10px;
            }

            .input-group button{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
            }

            .modal-content button{
                background: #1976d2;
                width: fit-content; 
                height: 40px; 
                margin: 10px; 
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
                text-align: center;
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
    </body>
    <footer class="footer footer-expand-lg fixed-bottom">
        <p class="rights"> © 2022 Winmars Properties S.R.L. All rights reserved. </p>
        <p class="date" id="date"></p>
    </footer>

    <script type="text/javascript">
        function fecha(){
            var today = new Date();
            var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes();
            var dateTime = date+' '+time;

            document.getElementById('date').innerHTML = dateTime;
        }
      
        setInterval(fecha, 1000);
      </script>
</html>