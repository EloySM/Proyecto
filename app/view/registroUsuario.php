<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">

    <label for="NombreUsuario">Nombre:</label>
    <input type="text" name="nombre">
    <label for="Contraseña"></label>
    <input type="password">
    <input type="button" value="Iniciar Sesion" name="inicioSesion">


    </form>


    <?php

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($POST['inicioSesion'])){






    }



?>
</body>
</html>