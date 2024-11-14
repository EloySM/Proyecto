<?php
session_start(); // Iniciamos la sesión para guardar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    require_once "../controller/UsuarioController.php";
    require_once "../model/usuarios.php";

    $usuarioController = new UsuarioController();
    $datos = $usuarioController->datosUsuario($_SESSION['usuario']);



    ?>

    <form method="POST">
        <h3>Bienvenido: <?php echo $_SESSION['usuario']; ?>!<h3>
                <input type="submit" value="Cerrar sesión" name="logout">
                <input type="submit" value="Modificar perfil" name="modificar">
    </form>

    <?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
        (new UsuarioController())->logout();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])) {
        header('Location: modificarPerfil.php');
    }

    ?>

</body>

</html>