<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Usuarios</title>
    </head>

    <body>

        <center>
            <form action="/registrarUsuarios" method="POST">
                
                @csrf
                <label for="codemp">Empleado</label>
                <input type="text" name="codemp" placeholder="Empleado...">
                <br> <br> 
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" placeholder="Nombre de usuario...">
                <br> <br> 
                <label for="email">Correo</label>
                <input type="email" name="email" placeholder="Correo...">
                <br> <br> 
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña...">
                <br> <br> 
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña...">
                <br> <br> 
                <label for="rol">rol</label>
                <input type="text" name="rol" placeholder="rol...">
                <br> <br> 
                <label for="status">Estado</label>
                <input type="text" name="status" placeholder="Estado...">
                <br> <br>

                <button type="submit"> Registrar </button>

            </form>
        </center>
        
    </body>
</html>