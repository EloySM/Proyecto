<?php
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="search" name="search" id="search" placeholder="Buscar producto por nombre">
        <button type="submit" name="buscar">Buscar</button>
    </form>
    <form method="POST">
        <input type="submit" value="Mostrar todos los productos" name="mostrarProductos">
    <?php
    require_once "../../app/controller/ProductoController.php";

    $productoController = new ProductoController();
    $productos = $productoController->obtenerProductos();
    
    if (!isset($_POST['search']) || isset($_POST['mostrarProductos'])) {
    if (!empty($productos)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Tipo</th><th>Precio</th><th>Likes</th></tr>";

        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>" . $producto['ID_Producto'] . "</td>";
            echo "<td>" . $producto['Nombre'] . "</td>";
            echo "<td>" . $producto['Tipo'] . "</td>";
            echo "<td>" . $producto['Precio'] . "</td>";
            echo "<td>" . $producto['Likes'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No hay productos disponibles.";
    }
}

    if (isset($_POST['search'])) {
        $nombre = $_POST['search'];
        $producto = $productoController->obtenerProductoNombre($nombre);

        if (!empty($producto)) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Tipo</th><th>Precio</th><th>Likes</th></tr>";

            foreach ($producto as $prod) {
                echo "<tr>";
                echo "<td>" . $prod['ID_Producto'] . "</td>";
                echo "<td>" . $prod['Nombre'] . "</td>";
                echo "<td>" . $prod['Tipo'] . "</td>";
                echo "<td>" . $prod['Precio'] . "</td>";
                echo "<td>" . $prod['Likes'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron productos con ese nombre.";
        }
    }

    ?>




</body>
</html>