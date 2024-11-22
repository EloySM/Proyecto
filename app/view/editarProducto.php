<?php
session_start();
require_once "../../app/controller/ProductoController.php";

$productoController = new ProductoController();

if (!isset($_SESSION['id'])) {
    echo "Error: ID de producto no definido.";
    exit();
}

$ID_Producto = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])) {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];

    $productoController->modificarProducto($ID_Producto, $nombre, $tipo, $precio);
    echo "Producto modificado con éxito.";
}

// Obtener los datos actualizados del producto
$producto = $productoController->obtenerProductoPorId($ID_Producto);

if (!$producto) {
    echo "Error: Producto no encontrado.";
    exit();
}

$nombre = $producto['Nombre'];
$tipo = $producto['Tipo'];
$precio = $producto['Precio'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre); ?>">
        <input type="text" name="tipo" placeholder="Tipo" value="<?php echo htmlspecialchars($tipo); ?>">
        <input type="text" name="precio" placeholder="Precio" value="<?php echo htmlspecialchars($precio); ?>">
        <input type="submit" value="Editar" name="editar">
    </form>
</body>
</html>