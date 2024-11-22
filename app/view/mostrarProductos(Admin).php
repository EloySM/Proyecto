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
    </form>
    
    <form method="POST">
        <input type="submit" value="Volver" name="volver">  

    </form>


    <?php
    require_once "../../app/controller/ProductoController.php";

    $productoController = new ProductoController();
    $productos = $productoController->obtenerProductos();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
        if (isset($_POST['ID_Producto']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['precio'])) {
            $ID_Producto = $_POST['ID_Producto'];
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $precio = $_POST['precio'];
            $productoController->modificarProducto($ID_Producto, $nombre, $tipo, $precio);
            $_SESSION['id'] = $ID_Producto;
            header('Location: editarProducto.php');
            exit(); 
        } else {
            echo "Error: Datos del producto no definidos.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['volver'])) {
        header('Location: paginaUsuario.php');
    }


    if (!isset($_POST['search']) || isset($_POST['mostrarProductos'])) {

        if (!empty($productos)) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Tipo</th><th>Precio</th><th>Likes</th></tr>";

            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['ID_Producto'] . "</td>";
                echo "<td>" . $producto['Nombre'] . "</td>";
                echo "<td>" . $producto['Tipo'] . "</td>";
                echo "<td>" . $producto['Precio'] . " €" . "</td>";
                echo "<td>" . $producto['Likes'] . "</td>";
                echo "<td>
                      <form method='POST' action=''>
                        <input type='hidden' name='ID_Producto' value='" . $producto['ID_Producto'] . "'>
                        <input type='hidden' name='nombre' value='" . $producto['Nombre'] . "'>
                        <input type='hidden' name='tipo' value='" . $producto['Tipo'] . "'>
                        <input type='hidden' name='precio' value='" . $producto['Precio'] . "'>
                    <input type='submit' name='editar' id='modificar' value='Editar'>
                </form>
              </td>";
                echo "</tr>";
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
                echo "<td>
                    <form method='POST' action=''>
                        <input type='hidden' name='ID_Producto' value='" . $prod['ID_Producto'] . "'>
                        <input type='hidden' name='nombre' value='" . $prod['Nombre'] . "'>
                        <input type='hidden' name='tipo' value='" . $prod['Tipo'] . "'>
                        <input type='hidden' name='precio' value='" . $prod['Precio'] . "'>
                    <input type='submit' name='editar' id='modificar' value='Editar'>
                </form>
              </td>";
                echo "</tr>";
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