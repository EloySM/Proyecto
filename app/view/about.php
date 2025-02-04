<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/about.css">
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
                <li><a href="home.php">Inicio</a></li>
                <li><a href="products.php">Productos</a></li>
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </div>
    </div>

    <div id="container-padre">
        <div class="container1">

            <img src="img/about/veterinario.png" alt="">

            <div class="container2">
                <h2>About</h2>
                <p>Nature´s Variety nació en St. Louis, EE. UU. con el objetivo de ofrecer una nutrición natural, holística y equilibrada para mejorar el bienestar físico y mental de perros y gatos. Lo tuvimos claro desde el principio: los ingredientes naturales y de calidad son la base de una alimentación sana
                </p>
            </div>
        </div>

        <div class="container1">

        <img src="img/about/perro-triston.png" alt="">

            <div class="container2">
                <h2>About</h2>
                <p>Nature´s Variety nació en St. Louis, EE. UU. con el objetivo de ofrecer una nutrición natural, holística y equilibrada para mejorar el bienestar físico y mental de perros y gatos. Lo tuvimos claro desde el principio: los ingredientes naturales y de calidad son la base de una alimentación sana
                </p>
            </div>

        </div>

        <div class="container1">

            <img src="img/about/perro.png" alt="">

            <div class="container2">
                <h2>About</h2>
                <p>Nature´s Variety nació en St. Louis, EE. UU. con el objetivo de ofrecer una nutrición natural, holística y equilibrada para mejorar el bienestar físico y mental de perros y gatos. Lo tuvimos claro desde el principio: los ingredientes naturales y de calidad son la base de una alimentación sana
                </p>
            </div>

        </div>
    </div>


    <footer>
        <p>&copy; 2024 Johnni Willi & Association. All rights reserved.</p>
    </footer>

</body>

</html>