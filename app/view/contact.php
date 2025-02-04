<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
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
                <li><a href="about.php">Sobre Nosotros</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
    </div>

    <div id="bloque">
        <h2>Contacta con nosotros</h2>
        <h3>We will be happy to assist your needs.</h3>

        <form action="#" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="empresa" placeholder="Empresa">
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="movil" placeholder="Movil">
            <input type="text" name="asunto" placeholder="Asunto" required>
            <textarea name="mensaje" placeholder="Mensaje" required></textarea>
            <div>
                <input type="checkbox" id="terms" name="terms" required>
                <a href="condicionesFormulario.html"><label>Acepto los términos y condiciones</label></a>
            </div>
            <input id="submit" type="submit" name="submit" value="Send">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Johnni Willi & Association. All rights reserved.</p>
    </footer>
</body>

</html>

<?php

require_once '../../app/controller/FormularioController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $idUsuario = $_SESSION['id'];
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
    $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_SPECIAL_CHARS);
    $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $movil = filter_input(INPUT_POST, 'movil', FILTER_SANITIZE_SPECIAL_CHARS);
    $asunto = filter_input(INPUT_POST, 'asunto', FILTER_SANITIZE_SPECIAL_CHARS);
    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($nombre) || empty($apellido) || empty($email) || empty($asunto) || empty($mensaje)) {
        echo "Son obligatorios los campos Nombre, Apellido, Email, Asunto y Mensaje";
        exit;
    }

    $formulario = (new FormularioController())->formularioRegistro($idUsuario, $nombre, $apellido, $empresa, $email, $movil, $asunto, $mensaje);
}

?>