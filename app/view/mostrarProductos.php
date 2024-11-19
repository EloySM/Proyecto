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
    
    <?php
    require_once "../../app/controller/ProductoController.php";

    $productoController = new ProductoController();
    $productos = $productoController->obtenerProductos();

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


    ?>




</body>
</html>