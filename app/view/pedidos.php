<?php

session_start(); // Iniciamos la sesión para guardar el nombre del usuario
require_once "../controller/PedidoController.php";

$pedidosController = new PedidoController();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Eliminar'])){
    if(isset($_POST['ID_Producto'])){
        $ID_Producto = $_POST['ID_Producto'];
        $pedidosController->eliminarpedido($ID_Producto);
        // Redirigir para evitar reenvío del formulario al recargar la página
        header("Location: pedidos.php");
        exit();
    }
}

$pedidos = $pedidosController->getPedidos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <title>Pedidos</title>
    <link rel="shortcut icon" href="img/rabbit.png" type="image/x-icon">

</head>
<body>
<?php if (empty($pedidos)): ?>
        <p>No hay productos en la lista pedidos.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <?php 
                    $producto = $pedidosController->getProductoById($pedido['ID_Producto']);
                    if ($producto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($producto['Tipo']); ?></td>
                            <td><?php echo htmlspecialchars($producto['Precio']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($producto['ruta']); ?>" alt="<?php echo htmlspecialchars($producto['Nombre']); ?>" width="100">
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="ID_Producto" value="<?php echo htmlspecialchars($pedido['ID_Producto']); ?>">
                                    <button type="submit" name="Eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    
    <a href="paginaUsuario.php"><button>Volver</button></a> 
</body>
</html>