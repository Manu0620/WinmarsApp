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
                <label for="nomusu">Nombre de usuario/correo</label>
                <br>
                <input type="text" name="nomusu" placeholder="Nombre de usuario/correo...">
                <br> <br> 
                <label for="contus">Contraseña</label>
                <br>
                <input type="password" name="contus" placeholder="Contraseña...">
                <br> <br> 

                <input type="submit" value="Login">

            </form>
        </center>
        
    </body>
</html>