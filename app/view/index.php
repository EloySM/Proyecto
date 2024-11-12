<?php
    session_start(); // Iniciamos la sesión para guardar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>

<body>
   
        <h1>Log in</h1>
    
        <form method="POST">
            <input id="nombreUsuario" class="inputSesion" type="text" name="nameUser" placeholder="Name" required>
            <input id="contraseña" class="inputSesion" type="password" name="passwordUser" placeholder="Password" required>
    
            <div class="toggle-container">
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
                <p>Recordarme</p>
                <a id="fpass" href="">Forgot your password</a>
            </div>
    
    
            <div>
                <input id="login" class="inputs" type="submit" name="login" value="Login">
                <input id="signup" class="inputs" type="submit" name="signup" value="Sign up">
            </div>
        </form>


    <?php

    require_once "../controller/UsuarioController.php";


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $name = $_POST['nameUser'];
        $password = $_POST['passwordUser'];
        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado = htmlspecialchars($_POST['nameUser']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['passwordUser']);

        $usuarioValido = (new UsuarioController())->loginUsuario($campoNombreSaneado, $campoContraseñaSaneado);
        if ($usuarioValido == true) {
            $_SESSION['usuario'] = $campoNombreSaneado;
            $_SESSION['id'] = $usuarioValido[0]['ID_Usuario'];
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