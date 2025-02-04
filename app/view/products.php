<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/products.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

</head>

<body>

    <?php

    require_once "../controller/PedidoController.php";
    require_once "../controller/FavoritoController.php";
    require_once "../controller/ProductoController.php";
    require_once "../controller/LikeController.php";
    require_once "../controller/DeseadoController.php";

    $productController = new ProductoController();
    $likeController = new LikeController();

    $productosPerro = $productController->obtenerProductosPorTipo('Perro', null);
    $productosGato = $productController->obtenerProductosPorTipo('Gato', null);
    $masLikes = $likeController->mostrarConMasLikes();

    ?>



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
                <li><a href="#">Procuctos</a></li>
                <li><a href="about.php">Sobre nosotros</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </div>
    </div>

    <h3>Más Likes</h3>

    <div class="container">
        <?php if (!empty($masLikes)): ?>
            <?php foreach ($masLikes as $producto): ?>
                <form action="" method="POST">
                    <div class="container-food">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($producto['ID_Producto']) ?>">

                        <div class="icons-top">
                            <button type="submit" name="list"></button>
                            <button type="submit" name="favorite"><button>
                        </div>

                        <img src="<?= htmlspecialchars(($producto['ruta'])) ?>" alt="<?= htmlspecialchars($producto['Nombre']) ?>">

                        <div class="product-info">
                            <button type="submit" name="like"></button>

                            <p><?= htmlspecialchars(($producto['Nombre'])) ?></p>
                            <!-- 2->para tener 2 decimales y ','->para que los decimales tengan una coma y no punto -->
                            <p><?= number_format($producto['Precio'], 2, ',') ?>€</p>

                            <button type="submit" name="comprar">Comprar</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos</p>
        <?php endif; ?>
    </div>

    <h3>Comida perro</h3>

    <div id="comida-perro" class="container">
        <?php if (!empty($productosPerro)): ?>
            <?php foreach ($productosPerro as $producto): ?>
                <form action="" method="POST">
                <input type="hidden" name="product_id" value="<?= htmlspecialchars($producto['ID_Producto']) ?>">

                    <div class="container-food">
                        <div class="icons-top">
                            <button type="submit" name="list"></button>
                            <button type="submit" name="favorite"></button>

                        </div>
                        <img src="<?= htmlspecialchars(($producto['ruta'])) ?>" alt="<?= htmlspecialchars($producto['Nombre']) ?>">

                        <div class="product-info">
                            <button type="submit" name="like"></button>

                            <p><?= htmlspecialchars(($producto['Nombre'])) ?></p>
                            <!-- 2->para tener 2 decimales y ','->para que los decimales tengan una coma y no punto -->
                            <p><?= number_format($producto['Precio'], 2, ',') ?>€</p>

                            <button type="submit" name="comprar">Comprar</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos</p>
        <?php endif; ?>

    </div>


    <h3>Comida gato</h3>

    <div id="comida-gato" class="container">
        <?php if (!empty($productosGato)): ?>
            <?php foreach ($productosGato as $producto): ?>
                <form action="" method="POST">
                    <div class="container-food">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($producto['ID_Producto']) ?>">

                        <div class="icons-top">
                            <button type="submit" name="list"></button>
                            <button type="submit" name="favorite"></button>
                        </div>
                        <img src="<?= htmlspecialchars(($producto['ruta'])) ?>" alt="<?= htmlspecialchars($producto['Nombre']) ?>">

                        <div class="product-info">
                            <button type="submit" name="like"></button>

                            <p><?= htmlspecialchars($producto['Nombre']) ?></p>
                            <p><?= number_format($producto['Precio'], 2, ',') ?>€</p>

                            <button type="submit" name="comprar">Comprar</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Johnni Willi & Association. All rights reserved.</p>
    </footer>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['like'])) {

        $likeController = new LikeController();
        $likeController->darQuitarLike($_SESSION['id'], $_POST['product_id']);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favorite'])) {

        $botonFavorite = new FavoritoController();
        $botonFavorite->añadirFavorito($_SESSION['id'], $_POST['product_id']);

        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['list'])) {

        $deseadoController = new DeseadoController();
        $deseadoController->añadirDeseado($_SESSION['id'], $_POST['product_id']);

        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comprar'])) {

        $pedidoController = new PedidoController();
        $carrito = $pedidoController->comprobarCarrito();

        if (!empty($carrito)) {
            echo "<script>alert('Solo puedes añadir un producto a la cesta');</script>";
        } else {
            $pedidoController->añadirProductoCarrito($_SESSION['id'], $_POST['product_id']);
        }

        exit();
    }

    ?>

</body>

</html>