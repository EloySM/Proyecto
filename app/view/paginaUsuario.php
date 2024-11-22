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
                <input type="submit" value="Favoritos" name="favoritos">
                
                <?php if ($_SESSION['admin'] == 1): ?>
                    <input type="submit" value="Mostrar productos" name="mostrarProductos">
                <?php endif; ?>

                <input type="submit" value="Volver" name="volver">

    </form>

    <?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
        (new UsuarioController())->logout();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modificar'])) {
        header('Location: modificarPerfil.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favoritos'])) {
        header('Location: favoritos.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mostrarProductos'])) {
        header('Location: mostrarProductos(Admin).php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['volver'])) {
        header('Location: home.php');
    }



    ?>

</body>

</html>