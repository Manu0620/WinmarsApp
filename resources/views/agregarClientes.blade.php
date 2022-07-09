<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Registro de Clientes</title>
    </head>

    <body>

    <div class="container">
        <form action="/agregarClientes" class="form-horizontal" method="POST">
        @csrf
        <fieldset>
                <legend class="text-center header">Registro de Clientes</legend>
            <div class="form-row align-items-center">
            <div class="col-6">
                <label for="nomcli">Nombre</label>
                <input type="text" class="form-control" name="nomcli" placeholder="Ingrese el nombre...">
            </div>
            <div class="col-6">
                <label for="apecli">Apellido</label>
                <input type="text" class="form-control" name="apecli" placeholder="Ingrese el apellido...">
            </div>
            <div class="col-6">
                <label for="tecli1">Teléfono 1</label>
                <input type="text" class="form-control" name="tecli1" placeholder="Ingrese el teléfono 1...">
            </div>
            <div class="col-6">
                <label for="tecli2">Teléfono 2</label>
                <input type="text" class="form-control" name="tecli2" placeholder="Ingrese el teléfono 2...">
            </div>
            <div class="col-6">
                <label for="dircli">Dirección</label>
                <input type="text" class="form-control" name="dircli" placeholder="Ingrese la dirección...">
            </div>
            <div class="col-6">
                <label for="corcli">Correo Electrónico</label>
                <input type="text" class="form-control" name="corcli" placeholder="Ingrese el correo electrónico...">
            </div>
            <div class="col-6">
                <label for="cedrnc">Cédula/RNC</label>
                <input type="text" class="form-control" name="cedrnc" placeholder="Ingrese la cédula/RNC...">
            </div>
            <div class="col-auto my-1">
            <label class="mr-sm-2" for="codtpcli">Tipo de Cliente</label>
            <select class="custom-select mr-sm-2" name="codtpcli">
                <option selected>Elija una opción...</option>
                <option value="1">Comprador</option>
                <option value="2">Vendedor</option>
            </select>
            </div>
            <div class="col-6">
                <label for="estcli">Estado</label>
                <input type="text" class="form-control" name="estcli" placeholder="Estado...">
            </div>
            <div class="col-auto my-1">
            <button type="submit" class="btn btn-primary">Registrar</button>
            </div>  
            </fieldset>
        </form>

    </div>
    </body>
</html>