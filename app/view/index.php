<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST">
        <p>Usuario</p><input type="text" name="nameUser" id="nombreUsuario" required>
        <p>Password</p><input type="password" name="passwordUser" id="contraseña" required>
        <input type="submit" name="inputIndex">
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
        if ($usuarioValido == true){
            header("Location: home.php");
            exit();
        }else {
            header("Location" . $_SERVER['PHP_SELF']);
            exit();            
        }
    }

    ?>

</body>

</html>