<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/products.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

</head>

<body>

    <?php

    require_once "../controller/ProductoController.php";

    $productController = new ProductoController();

    $productosPerro = $productController->obtenerProductosPorTipo('Perro');
    $productosGato = $productController->obtenerProductosPorTipo('Gato');

    ?>
    <div id="header-container">
        <h1>Johnni Willi & Association</h1>
        <a href="paginaUsuario.php"><div id="perfil" >
            <img src="img/maniqui.png" alt="">
            <?php echo "<h2>" . $_SESSION['usuario'] . "</h2>"; ?>
        </div></a>
    </div>


    <div id="navegador-container">
        <div id="navegador">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <h3>Comida perro</h3>

    <div id="container">
        <?php if (!empty($productosPerro)): ?>
            <?php foreach ($productosPerro as $producto): ?>
                <div class="container-food">

                    <div class="icons-top">
                        <img src="img/products/Frame.png" alt="">
                        <img src="img/products/favorite.png" alt="">
                    </div>
                    <img src="<?= htmlspecialchars(($producto['ruta'])) ?>" alt="<?= htmlspecialchars($producto['Nombre']) ?>">

                    <div class="product-info">
                        <p><?= htmlspecialchars(($producto['Nombre'])) ?></p>
                        <!-- 2->para tener 2 decimales y ','->para que los decimales tengan una coma y no punto -->
                        <p><?= number_format($producto['Precio'], 2, ',') ?>€</p>
                        <img src="img/products/like.png" alt="">
                        <button>Buy</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos</p>
        <?php endif; ?>

    </div>


    <h3>Comida gato</h3>

    <div id="container">
        <?php if (!empty($productosGato)): ?>
            <?php foreach ($productosGato as $producto): ?>
                <div class="container-food">

                    <div class="icons-top">
                        <img src="img/products/Frame.png" alt="">
                        <img src="img/products/favorite.png" alt="">
                    </div>
                    <img src="<?= htmlspecialchars(($producto['ruta'])) ?>" alt="<?= htmlspecialchars($producto['Nombre']) ?>">

                    <div class="product-info">
                        <p><?= htmlspecialchars($producto['Nombre']) ?></p>
                        <p><?= number_format($producto['Precio'], 2, ',') ?>€</p>
                        <img src="img/products/like.png" alt="">
                        <button>Buy</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Johnni Willi & Association. All rights reserved.</p>
    </footer>

</body>

</html>