<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">

        <label for="Nombre">Nombre:</label>
        <input type="text" name="nombre">
        <label for="UserName">Nombre de Usuario</label>
        <input type="text" name="usuario">
        <label for="Contraseña">Contraseña</label>
        <input type="password" name="contraseña">
        <input type="submit" value="Iniciar Sesion" name="registro">


    </form>


    <?php

    require_once "../controller/UsuarioController.php";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {

 
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contraseña'];
        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado = htmlspecialchars($_POST['nombre']);
        $campoeUsuarioSaneado = htmlspecialchars($_POST['usuario']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['contraseña']);

        if (empty($campoNombreSaneado) || empty($campoeUsuarioSaneado) || empty($campoContraseñaSaneado)) {
            echo "Todos los campos son obligatorios";
            // exit;
            return false;
        }

        $usuarioNuevo = (new UsuarioController())->crearUsuario($campoNombreSaneado,$campoeUsuarioSaneado,$campoContraseñaSaneado);
    }
    ?>
</body>

</html>