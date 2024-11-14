<?php
session_start(); // Iniciamos la sesión para mostrar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
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