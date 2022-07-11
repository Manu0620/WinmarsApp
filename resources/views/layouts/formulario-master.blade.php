<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registros</title>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <style>
            *{
                font-family: 'Nunito', sans-serif;
            }

            img{
                width: 100px;
                image-rendering: optimizeQuality;
            }

            body{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100vh;
            }

            .form-container{
                width: 35%;
                margin-top: 8%;
            }

            .form-container input, .form-container select{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
            }

            .form-container input:hover, .form-container select:hover{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .form-container input:focus, .form-container select:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .form-container button{
                background: #1976d2;
                padding: 10px 30px 10px 30px;
            }

            h1, h3{
                font-weight: bold;
                text-align: center;
                margin: 30px;
            }
        </style>
    </head>

    <body>
        
        @include('layouts.partials.navbar')

        <main class="form-container">
            @yield('content')
        </main>

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>