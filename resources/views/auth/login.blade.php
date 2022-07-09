<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <center>

            <form action="/login" method="POST">
                
                @csrf
                <br>
                <label for="">Login</label>
                <br> <br>
                <label for="username">Nombre de usuario/correo</label>
                <br>
                <input type="text" name="username" placeholder="Nombre de usuario...">
                <br> <br> 
                <label for="password">Contraseña</label>
                <br>
                <input type="password" name="password" placeholder="Contraseña...">
                <br> <br> 

                <input type="submit" value="Login">

            </form>
        
        </center>  
    </body>
</html>