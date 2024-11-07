<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="registroUsuario.php">

    <label for="Nombre">Nombre:</label>
    <input type="text" name="nombre">
    <label for="UserName">Nombre de Usuario</label>
    <input type="text" name="usuario">
    <label for="Contraseña">Contraseña</label>
    <input type="password" name="contraseña">
    <input type="submit" value="Iniciar Sesion" name="inicioSesion">


    </form>


    <?php

    require_once "../controller/UsuarioContoller.php";
    require_once "../model/usuarios.php";

    $usuario = new Usuario();
    $usuarioController = new UsuarioController();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['inicioSesion'])){

        $usuarioController -> añadirUsuarios();


    }



?>
</body>
</html>