<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/registroUsuario.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>

<body>

    <h1>Sign up</h1>

    <form method="POST">

        <input class="inputText" type="text" name="name" placeholder="Name">
        <input class="inputText" type="text" name="userName" placeholder="Username">
        <input id="password" class="inputText" type="passw" name="password" placeholder="Password">

        <div id="a2">
            <input type="submit" id="signup" name="registro" class="inputs" value="Sign up">
            <input type="submit" id="login" name="login" class="inputs" value="Login">
        </div>

    </form>


    <?php

    require_once "../controller/UsuarioController.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {

        $nombre = $_POST['name'];
        $usuario = $_POST['userName'];
        $contrasena = $_POST['password'];
        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado = htmlspecialchars($_POST['name']);
        $campoeUsuarioSaneado = htmlspecialchars($_POST['userName']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['password']);

        if (empty($campoNombreSaneado) || empty($campoeUsuarioSaneado) || empty($campoContraseñaSaneado)) {
            echo "Todos los campos son obligatorios";
            // exit;
            return false;
        }

        $usuarioNuevo = (new UsuarioController())->crearUsuario($campoNombreSaneado, $campoeUsuarioSaneado, $campoContraseñaSaneado);
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        header("Location: index.php");
    }
    ?>
</body>

</html>