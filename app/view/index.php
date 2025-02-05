<?php
session_start(); // Iniciamos la sesión para guardar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/rabbit.png" type="image/x-icon">
</head>

<body>

    <h1>Log in</h1>

    <form method="POST">

        <input id="nombreUsuario" class="inputSesion" type="text" name="nameUser" placeholder="Nombre de usuario">
        <input id="contraseña" class="inputSesion" type="password" name="passwordUser" placeholder="Contraseña">
        <a id="fpass" href="">Olvidaste la contraseña?</a>
        <div class="toggle-container">
            <label class="toggle-switch">
                <input type="checkbox">
                <span class="slider"></span>
            </label>
            <p>Recordarme</p>

        </div>
        <div>
            <input id="login" class="inputs" type="submit" name="login" value="Login">
            <!-- Este input (Sign up) trata de envia el formulario antes de ejecutar el evento onclick, para solucionarlo se cambia el tipo a button -->
            <input onclick="window.location.href='registroUsuario.php';" id="signup" class="inputs" type="button" name="signup" value="Sign up">
        </div>

    </form>


    <?php

    require_once "../controller/UsuarioController.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $campoNombreSaneado = htmlspecialchars($_POST['nameUser']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['passwordUser']);

        $usuarioValido = (new UsuarioController())->loginUsuario($campoNombreSaneado, $campoContraseñaSaneado);
        if ($usuarioValido == true) {
            // Me guardo el usuario,id y el booleano de si es admin en la sesión para usarlo mas adelante
            $_SESSION['usuario'] = $campoNombreSaneado;
            $_SESSION['id'] = $usuarioValido[0]['ID_Usuario'];
            $_SESSION['admin'] = $usuarioValido[0]['EsAdmin'];
            header("Location: home.php");
            exit();
        } else {
            header("Location" . $_SERVER['PHP_SELF']);
            echo " <h3>Usuario o contraseña incorrectos.<h3>";
            exit();
        }
    }

    ?>

</body>

</html>