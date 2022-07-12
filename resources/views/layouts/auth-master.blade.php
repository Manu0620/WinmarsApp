<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Aplicacion de Login</title>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700&display=swap" rel="stylesheet">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
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

            label{
                margin-left: 10px;
            }

            .form-container{
                width: 25%;
            }

            .form-container input{
                border: 1px solid #6c757d;
                border-bottom: 3px solid #6c757d;
                border-radius: 10px; 
            }

            .form-container input:hover , .form-container select:focus{
                border: 1px solid #1976d2;
                border-bottom: 3px solid #1976d2;
            }

            .form-container button{
                background: #1976d2;
                width: 100px;
                height: 45px;
                margin: 10px;
                font-weight: bold;
                border-radius: 10px;
            }

            .form-container button:hover{
                background: #1565C0;
            }

            .button-group{
                text-align: center;
            }

            h3{
                font-size: 36px;
                font-weight: bold;
                text-align: center;
            }
        </style>
    </head>

    <body>

        <main class="form-container">
            @yield('content')
        </main>

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>