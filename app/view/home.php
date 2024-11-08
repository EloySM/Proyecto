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
    if (isset($_SESSION['nombreUsuario'])) {
        $username = $_SESSION['nombreUsuario'];
        echo " <h3>Bienvenido, " . htmlspecialchars($username) . "!<h3>";
    } else {
        echo "No has iniciado sesión.";
    }
    ?>
</body>
</html>