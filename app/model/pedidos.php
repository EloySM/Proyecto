<?php


class pedidos
{

    private $idUsuario;
    private $idProducto;

    public function __construct($idUsuario, $idProducto)
    {

        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    public function añadirProductoCarrito($idUsuario, $idProducto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO pedidos (ID_Usuario, ID_Producto) VALUES (?, ?)");
        $sentencia->bindParam(1, $idUsuario);
        $sentencia->bindParam(2, $idProducto);
        $sentencia->execute();

    }

    public function eliminarProductoCarrito($idUsuario, $idProducto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("DELETE FROM pedidos WHERE ID_Usuario = ? AND ID_Producto = ?");
        $sentencia->bindParam(1, $idUsuario);
        $sentencia->bindParam(2, $idProducto);
        $sentencia->execute();


    }

public function getCarrito($idUsuario)
{
    $conn = getDBConnection();
    $sentencia = $conn->prepare("SELECT * FROM pedidos WHERE ID_Usuario = ?");
    $sentencia->bindParam(1, $idUsuario);
    $sentencia->execute();
    $result = $sentencia->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}

    public function obtenerProductoPorId($idProducto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM pedidos WHERE ID_Producto = ?");
        $sentencia->bindParam(1, $idProducto);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
        
    }

    public function comprobarCarrito(){


        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT COUNT(*) as count FROM pedidos WHERE ID_Usuario = ?");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->execute();
        $result = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo "Solo se puede añadir un producto al carrito.";
        } else {
            echo "Puedes añadir un producto al carrito.";
        }


    }
}
