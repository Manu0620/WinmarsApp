<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Registros</title>

        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;700;800;900&display=swap" rel="stylesheet">
        <!--Bootstrap-->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <!--Styles-->
        <style>
            *{
                font-family: 'Nunito', sans-serif;
            }

            img{
                width: 150px;
                image-rendering: crisp-edges;
            }

            body{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
            }

            .tab-nav a:visited,.tab-nav a:link,.tab-nav a:active{
                text-decoration: none;
                color: #1976d2;
            }

            a:visited, a:link, a:active{
                text-decoration: none;
            }

            .tab-nav{
                border: 1px solid #6c757d;
                border-bottom: 4px solid #6c757d;  
                border-radius: 10px;
                padding: 10px;
                margin-bottom: 30px; 
            }
            
            .tab-nav:hover{
                border: 1px solid #1976d2;
                border-bottom: 4px solid #1976d2; 
                border-radius: 10px;
                padding: 10px;
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

            .form-container{
                width: 35%;
                margin: 100px;
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
                width: 100px;
                height: 45px;
                margin: 10px;
                font-weight: bold;
            }

            .form-container button:hover{
                background: #1565C0;
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
        
        @include('layouts.partials.navbar')

        <main class="form-container">
            @yield('content')
        </main>

        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    </body>

</html>