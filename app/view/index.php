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
</head>

<body>

    <form method="POST">
        <input id="nombreUsuario" class="inputSesion" type="text" name="nameUser" placeholder="Name" required>
        <input id="contraseña" class="inputSesion" type="password" name="passwordUser" placeholder="Password" required>
        <input class="inputSesion" type="submit" name="inputIndex">
    </form>



    <?php

    require_once "../controller/UsuarioController.php";


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['inputIndex'])) {
        $name = $_POST['nameUser'];
        $password = $_POST['passwordUser'];
        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado = htmlspecialchars($_POST['nameUser']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['passwordUser']);

        $usuarioValido = (new UsuarioController())->loginUsuario($campoNombreSaneado, $campoContraseñaSaneado);
        if ($usuarioValido == true) {
            header("Location: home.php");
            exit();
        } else {
            header("Location" . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    ?>

</body>

</html>