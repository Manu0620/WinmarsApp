<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>

    <body>
        <center>

            <h1>Home</h1>
            
            @auth
                <p>Bienvenido {{auth()->user()->username}}, estas autenticado a la pagina</p>
            @endauth

            @guest
                <p>Para ver el contenido <a href="/login">inicia sesion</a></p>
            @endguest

        </center>
    </body>
</html>