<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
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
                width: 150px;
                image-rendering: pixelated;
            }

            a:active, a:link, a:visited{
                text-decoration: none;
            }

            body{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 100vh;
            }

            nav{
                font-weight: 800;
            }

            li{
                padding: 3px; 
                color: #1976d2;
            }

            .dropdown-item{
                padding: 10px 120px 10px 15px;
            }

            .dropdown-item:hover{
                background-color: #1976d2;
                color: #fff;
                border-radius: 10px;
            }

            .dropdown-menu{
                padding: 10px;
                font-size: 18px;
                font-weight: 900;
                text-align: left;
                border: 1px solid transparent;
                border-radius: 10px;
                box-shadow: 0px 5px 10px #6c757d84;
            }
        </style>
    </head>

    <body>

        @include('layouts.partials.navbar')

        <main class="container">
            @yield('content')
        </main>

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>