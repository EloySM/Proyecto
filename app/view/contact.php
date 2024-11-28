<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Exo:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
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
        <div class="containers" id="navegador">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <div id="bloque">

        <h2>Contact with us</h2>
        <h3>We will be happy to assist your needs.</h3>

        <form action="">

            <div>
                <input type="text" placeholder="Nombre">
                <input type="text" placeholder="Apellido">
            </div>

            <div>
                <input type="text" placeholder="Empresa">
                <input type="text" placeholder="Email">
            </div>

            <div><input type="text" placeholder="Movil">
                <input type="text" placeholder="Asunto">

            </div>
            <div>
                <input type="text" placeholder="Mensaje" style="grid-column: span 2;"> <!-- Mensaje ocupa 3 columnas -->
            </div>

                <p>Consentimiento:</p>

                <div>
                    <input type="checkbox">
                    <p>Acepto terminos y condiciones</p>
                    <input type="submit" value="Send">
                    
                </div>
        </form>
    </div>



    <footer>
        <p>&copy; 2024 Johnni Willi & Association. All rights reserved.</p>
    </footer>

</body>

</html>