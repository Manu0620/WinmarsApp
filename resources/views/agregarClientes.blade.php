<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Clientes</title>
    </head>

    <body>

        <center>
            <form action="/agregarClientes" method="POST">
                
                @csrf
                <label for="nomcli">Nombre</label>
                <input type="text" name="nomcli" placeholder="Nombre...">
                <br> <br> 
                <label for="apecli">Apellido</label>
                <input type="text" name="apecli" placeholder="Apellido...">
                <br> <br> 
                <label for="tecli1">Telefono 1</label>
                <input type="text" name="tecli1" placeholder="Telefono 1...">
                <br> <br> 
                <label for="tecli2">Telefono 2</label>
                <input type="text" name="tecli2" placeholder="Telefono 2...">
                <br> <br> 
                <label for="dircli">Direccion</label>
                <input type="text" name="dircli" placeholder="Direccion...">
                <br> <br> 
                <label for="corcli">Correo</label>
                <input type="text" name="corcli" placeholder="Correo...">
                <br> <br> 
                <label for="cedrnc">Cedula/RNC</label>
                <input type="text" name="cedrnc" placeholder="Cedula/RNC...">
                <br> <br> 
                <label for="codtpcli">Tipo cliente</label>
                <input type="text" name="codtpcli" placeholder="Tipo Cliente...">
                <br> <br> 
                <label for="estcli">Estado</label>
                <input type="text" name="estcli" placeholder="Estado...">
                <br> <br> 

                <button type="submit"> Nuevo Cliente </button>

            </form>
        </center>
        
    </body>
</html>