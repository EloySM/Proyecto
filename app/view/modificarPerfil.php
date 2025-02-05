<?php
session_start();
require_once "../controller/UsuarioController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar perfil</title>
    <link rel="stylesheet" href="css/modificarPerfil.css">
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.59/build/spline-viewer.js"></script>
    <link rel="shortcut icon" href="img/rabbit.png" type="image/x-icon">

</head>

<body>
    <div style="height: 100px; width: 300px; background-color: #121212; position:absolute; right:0; bottom:0; z-index:2"></div>
    <spline-viewer id="fondo" url="https://prod.spline.design/GIA9R-jsg97SXthx/scene.splinecode"></spline-viewer>

    <form autocomplete="off" method="POST">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">

        <div>
            <input id="modificar" type="submit" value="Modificar" name="Modificar">
            <input id="volver" type="submit" value="Volver" name="Volver">
        </div>
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

        // Verificación de éxito
        if ($result) {
            echo "<p>Perfil modificado con éxito.</p>";
            header('Location: paginaUsuario.php'); // Redirige después de la modificación
            exit();
        } else {
            echo "<p>No se pudo modificar el perfil. Intente de nuevo más tarde.</p>";
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Volver'])) {
        header('Location: paginaUsuario.php');
    }



    ?>
</body>

</html>