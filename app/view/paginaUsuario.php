<?php
session_start(); // Iniciamos la sesión para guardar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Usuario</title>
    <link rel="stylesheet" href="css/paginaUsuario.css">
    <link rel="shortcut icon" href="img/rabbit.png" type="image/x-icon">

</head>

<body>

    <?php
    require_once "../controller/UsuarioController.php";
    require_once "../model/usuarios.php";

    $usuarioController = new UsuarioController();
    $datos = $usuarioController->datosUsuario($_SESSION['usuario']);
    ?>

    <form method="POST">
        <h1>Bienvenido: <?php echo $_SESSION['usuario']; ?></h1>
        <input type="submit" value="Modificar perfil" name="modificar">
        <input type="submit" value="Pedidos" name="pedidos">
        <input type="submit" value="Favoritos" name="favoritos">
        <input type="submit" value="Lista Personalizada" name="lista">

        <?php if ($_SESSION['admin'] == 1): ?>
            <input type="submit" value="Mostrar productos" name="mostrarProductos">
        <?php endif; ?>

        <input type="submit" value="Volver" name="volver">
        <input type="submit" value="Cerrar sesión" name="logout">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['logout'])) {
            (new UsuarioController())->logout();
        } elseif (isset($_POST['modificar'])) {
            header('Location: modificarPerfil.php');
            exit();
        } else if (isset($_POST['pedidos'])) {
            header('Location: pedidos.php');
            exit();
        } elseif (isset($_POST['favoritos'])) {
            header('Location: favoritos.php');
            exit();
        } elseif (isset($_POST['lista'])) {
            header('Location: lista.php');
            exit();
        } elseif (isset($_POST['mostrarProductos'])) {
            header('Location: mostrarProductos(Admin).php');
            exit();
        } elseif (isset($_POST['volver'])) {
            header('Location: home.php');
            exit();
        }
    }
    ?>

</body>

</html>