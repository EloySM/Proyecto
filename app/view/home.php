<?php
session_start(); // Iniciamos la sesión para mostrar el nombre del usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>

<body>

    <div id="header-container">
        <h1>Johnni Willi & Association</h1>
        <a href="paginaUsuario.php">
            <div id="perfil">
                <img src="img/maniqui.png" alt="">
                <?php echo "<h2>" . $_SESSION['usuario'] . "</h2>"; ?>
            </div>
        </a>
    </div>

    <div id="navegador-container">
        <div id="navegador">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="products.php">Productos</a></li>
                <li><a href="about.php">Sobre Nosotros</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </div>
    </div>

    <div id="contenido">
        <div id="text">
            <p>Comida sana y natural</p>
            <p>"Si tu peludo no esta feliz, te devolveremos el dinero."</p>

            <img src="img/home/1-home.png" alt="">

        </div>

    </div>


    <div id="part2">
        <img src="img/home/perro1.png" alt="">
        <button onclick="window.location.href='products.php#comida-perro'">Comida para perros</button>
        <img src="img/home/gato1.png" alt="">
        <button onclick="window.location.href='products.php#comida-gato'">Comida para gatos</button>
    </div>

    <footer>
        <p>&copy; 2024 Johnni Willi & Association. All rights reserved.</p>
    </footer>


    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset(($_POST['login']))) {
        (new UsuarioController())->logout();
    }

    ?>
</body>

</html>