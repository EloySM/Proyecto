<?php
session_start();
require_once "../controller/UsuarioController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
        <input type="submit" value="Modificar" name="Modificar">
        <input type="submit" value="Volver" name="Volver">
    </form>




    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Modificar'])) {
        $id = $_SESSION['id'];
        $nombre = htmlspecialchars($_POST['nombre']);
        $usuario = htmlspecialchars($_POST['usuario']);
        $contraseña = htmlspecialchars($_POST['contraseña']);

        if (empty($nombre) || empty($usuario) || empty($contraseña)) {
            echo "Por favor, rellene todos los campos.";
            return;
        }

        if ((new UsuarioController())->existeUsuario($usuario)) {
            echo "El usuario ya existe";
            exit;
        }

        $usuarioController = new UsuarioController();
        $result = $usuarioController->modificarUsuario($id, $nombre, $usuario, $contraseña);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Volver'])) {
        header('Location: paginaUsuario.php');
    }



    ?>
</body>

</html>