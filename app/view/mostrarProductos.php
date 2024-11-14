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
    require_once "../model/Producto.php";   

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID_Producto</th>";
    echo "<th>Nombre</th>";
    echo "<th>Precio</th>";
    echo "<th>Likes</th>";
    echo "</tr>";

    foreach($productos as $producto){
        echo "<tr>";
        echo "<td>".$producto['id_producto']."</td>";
        echo "<td>".$producto['nombre']."</td>";
        echo "<td>".$producto['precio']."</td>";
        echo "<td>".$producto['likes']."</td>";
        echo "</tr>";
    }

    echo "</table>";


    ?>




</body>
</html>