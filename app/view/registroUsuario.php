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

        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado =htmlspecialchars($_POST['nombre']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['contraseña']);

        // Validar que el usuario no esté vacío
        
        if (empty($usuario) || empty($contraseña)) {
        echo "Usuario y contraseña son obligatorios.";
        // exit;
        }

        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO usuario (usuario, contraseña) VALUES (?, ?)");
        $sentencia->bindParam(1, $usuario);
        $sentencia->bindParam(2, $contraseña);


    }



?>
</body>
</html>