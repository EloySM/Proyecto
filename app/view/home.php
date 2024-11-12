<?php
    session_start(); // Iniciamos la sesión para mostrar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "../controller/UsuarioController.php";   

        echo " <h3>Bienvenido, " . $_SESSION['usuario'] . " tu id es:" . $_SESSION['id'] . "!<h3>";
    
    ?>

    <form method="post">
            <button type="submit">Cerrar sesión</button>
        </form>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        (new UsuarioController())->logout();
    }

    ?>
</body>
</html>