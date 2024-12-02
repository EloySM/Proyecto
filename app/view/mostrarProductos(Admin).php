<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/motrarProductos.css">
</head>

<body>

    <div class="search-container">
        <form method="POST" class="search-form">
            <input type="search" name="search" id="search" placeholder="Buscar producto por nombre">
            <!-- <button type="submit" name="buscar">Buscar</button> -->
        </form>
    </div>

    <?php
    require_once "../../app/controller/ProductoController.php";

    $productoController = new ProductoController();
    $productos = $productoController->obtenerProductos();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
        foreach ($_POST['productos'] as $producto) {
            if (isset($producto['ID_Producto']) && isset($producto['nombre']) && isset($producto['tipo']) && isset($producto['precio'])) {
                $ID_Producto = $producto['ID_Producto'];
                $nombre = $producto['nombre'];
                $tipo = $producto['tipo'];
                $precio = $producto['precio'];
                $productoController->modificarProducto($ID_Producto, $nombre, $tipo, $precio);
            }
        }
        $_SESSION['mensaje'] = "Productos editados correctamente.";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['volver'])) {
        header('Location: paginaUsuario.php');
    }

    if (isset($_SESSION['mensaje'])) {
        echo "<p class='mensaje'>" . $_SESSION['mensaje'] . "</p>";
        unset($_SESSION['mensaje']);
    }

    if (!isset($_POST['search']) || isset($_POST['mostrarProductos'])) {
        if (!empty($productos)) {
            echo "<form method='POST' action=''>";
            echo "<div class='content-container'>"; // Añadir contenedor común
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Tipo</th><th>Precio</th></tr>";
    
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['ID_Producto'] . "</td>";
                echo "<td><input type='text' name='productos[" . $producto['ID_Producto'] . "][nombre]' value='" . $producto['Nombre'] . "'></td>";
                echo "<td><input type='text' name='productos[" . $producto['ID_Producto'] . "][tipo]' value='" . $producto['Tipo'] . "'></td>";
                echo "<td><input type='text' name='productos[" . $producto['ID_Producto'] . "][precio]' value='" . $producto['Precio'] . "'></td>";
                echo "<input type='hidden' name='productos[" . $producto['ID_Producto'] . "][ID_Producto]' value='" . $producto['ID_Producto'] . "'>";
                echo "</tr>";
            }
    
            echo "</table>";
            echo "<div class='buttons-container'>";
            echo "<input type='submit' value='Mostrar todos los productos' name='mostrarProductos'>";
            echo "<input type='submit' value='Volver' name='volver'>";
            echo "<div class='edit-button-container'>";
            echo "<input type='submit' name='editar' value='Editar'>";
            echo "</div>";
            echo "</div>";
            echo "</div>"; // Cerrar contenedor común
            echo "</form>";
        } else {
            echo "No hay productos disponibles.";
        }
    }
    
    if (isset($_POST['search'])) {
        $nombre = $_POST['search'];
        $producto = $productoController->obtenerProductoNombre($nombre);

        if (!empty($producto)) {
            echo "<form method='POST' action=''>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Tipo</th><th>Precio</th></tr>";

            foreach ($producto as $prod) {
                echo "<tr>";
                echo "<td>" . $prod['ID_Producto'] . "</td>";
                echo "<td><input type='text' name='productos[" . $prod['ID_Producto'] . "][nombre]' value='" . $prod['Nombre'] . "'></td>";
                echo "<td><input type='text' name='productos[" . $prod['ID_Producto'] . "][tipo]' value='" . $prod['Tipo'] . "'></td>";
                echo "<td><input type='text' name='productos[" . $prod['ID_Producto'] . "][precio]' value='" . $prod['Precio'] . "'></td>";
                echo "<input type='hidden' name='productos[" . $prod['ID_Producto'] . "][ID_Producto]' value='" . $prod['ID_Producto'] . "'>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<div class='buttons-container'>";
            echo "<form method='POST'>";
            echo "<input type='submit' value='Mostrar todos los productos' name='mostrarProductos'>";
            echo "</form>";
            
            echo "<form method='POST'>";
            echo "<input type='submit' value='Volver' name='volver'>";
            echo "</form>";

            echo "<div class='edit-button-container'>";
            echo "<input type='submit' name='editar' value='Editar'>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "No se encontraron productos con ese nombre.";
        }
    }
    ?>

</body>
</html>