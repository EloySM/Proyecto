<?php
session_start();
require_once "../../app/controller/DeseadoController.php";

$deseadoController = new DeseadoController();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Eliminar'])) {
    if (isset($_POST['ID_Producto'])) {
        $ID_Producto = $_POST['ID_Producto'];
        $deseadoController->eliminarDeseado($ID_Producto);
        // Redirigir para evitar reenvío del formulario al recargar la página
        header("Location: lista.php");
        exit();
    }
}

$deseados = $deseadoController->getDeseados();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="css/lista.css">
    <link rel="shortcut icon" href="img/rabbit.png" type="image/x-icon">

</head>
<body>
    <?php if (empty($deseados)): ?>
        <p>No hay productos en la lista de deseados.</p>
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
                <?php foreach ($deseados as $deseado): ?>
                    <?php 
                    $producto = $deseadoController->getProductoById($deseado['ID_Producto']);
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
                                    <input type="hidden" name="ID_Producto" value="<?php echo htmlspecialchars($deseado['ID_Producto']); ?>">
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