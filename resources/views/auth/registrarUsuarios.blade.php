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
                <label for="nomusu">Nombre de usuario</label>
                <input type="text" name="nomusu" placeholder="Nombre de usuario...">
                <br> <br> 
                <label for="contus">Contraseña</label>
                <input type="password" name="contus" placeholder="Contraseña...">
                <br> <br> 
                <label for="confirmacion_contus">Confirmar Contraseña</label>
                <input type="password" name="confirmacion_contus" placeholder="Connfirmar Contraseña...">
                <br> <br> 
                <label for="correo">Correo</label>
                <input type="email" name="correo" placeholder="Correo...">
                <br> <br> 
                <label for="roles">Roles</label>
                <input type="text" name="roles" placeholder="Roles...">
                <br> <br> 
                <label for="estusu">Estado</label>
                <input type="text" name="estusu" placeholder="Estado...">
                <br> <br>

                <button type="submit"> Registrar </button>

            </form>
        </center>
        
    </body>
</html>