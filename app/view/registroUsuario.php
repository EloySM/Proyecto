<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="css/registroUsuario.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/rabbit.png" type="image/x-icon">

</head>

<body>

    <h1>Sign up</h1>

    <form method="POST">

        <input class="inputText" type="text" name="name" placeholder="Nombre">
        <input class="inputText" type="text" name="userName" placeholder="Nombre de Ussuario">
        <input id="password" class="inputText" type="password" name="password" placeholder="Contraseña">

        <div id="a2">
            <input type="submit" id="signup" name="registro" class="inputs" value="Sign up">
            <input type="submit" id="login" name="login" class="inputs" value="Login">
        </div>

    </form>

    <?php
    require_once "../controller/UsuarioController.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {
        $nombre = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $usuario = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
        $contrasena = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        // Comprobaciones
        if (empty($nombre) || empty($usuario) || empty($contrasena)) {
            echo "Todos los campos son obligatorios";
            exit;
        }

        if ((new UsuarioController())->existeUsuario($usuario)) {
            echo "El usuario ya existe";
            exit;
        }

        $usuarioNuevo = (new UsuarioController())->crearUsuario($nombre, $usuario, $contrasena);
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        header("Location: index.php");
    }

    ?>
</body>

</html>