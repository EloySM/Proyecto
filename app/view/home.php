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
    //<?php
        //require_once "../controller/UsuarioController.php";   

        //  echo " <h3>Bienvenido, " . $_SESSION['usuario'] . " tu id es:" . $_SESSION['id'] . "!<h3>";

        //
        ?>

    <!-- <form method="post">
        <button type="submit" name="s">Cerrar sesión</button>
    </form> -->
    <div id="header-container">
        <h1>Johnni Willi & Association</h1>
        <div id="perfil">
            <div>
                <h2>Eloy</h2>
            </div>
            <img src="img/maniqui.png" alt="">
            <!-- <h2>Eloy</h2> -->
        </div>
    </div>

    <div id="navegador-container">
        <div id="navegador">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <div id="contenido">
        <div id="text">
            <p>Natural and Healthy Food</p>
            <p>"If your furry friend is not happy, we will refund your money."</p>
        </div>

        <div id="imagenes">
            <img src="img/1-home.png" alt="">
        </div>

    </div>


    <div id="part2">
        <img src="img/perro1.png" alt="">
        <button>Comida para perros</button>
        <img src="img/gato1.png" alt="">
        <button>Comida para gatos</button>
    </div>

    <footer>
        <p>hola</p>
    </footer>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset(($_POST['login']))) {
        (new UsuarioController())->logout();
    }

    ?>
</body>

</html>