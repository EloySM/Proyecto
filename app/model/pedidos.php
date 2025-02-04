<?php

/**
 * Clase Pedidos
 * 
 * 
 * Esta clase gestiona las operaciones relacionadas con los pedidos de los usuarios,
 * como añadir productos al carrito, eliminar productos del carrito y consultar el estado del carrito.
 * 
 * @package Model
 */
class pedidos
{
    private $idUsuario;
    private $idProducto;

    /**
     * Constructor de la clase Pedidos.
     * 
     * @param int $idUsuario El ID del usuario que realiza el pedido.
     * @param int $idProducto El ID del producto relacionado con el pedido.
     */
    public function __construct($idUsuario, $idProducto)
    {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    /**
     * Añade un producto al carrito del usuario.
     * 
     * @param int $idUsuario El ID del usuario que realiza el pedido.
     * @param int $idProducto El ID del producto que se añade al carrito.
     */
    public function añadirProductoCarrito($idUsuario, $idProducto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO pedidos (ID_Usuario, ID_Producto) VALUES (?, ?)");
        $sentencia->bindParam(1, $idUsuario);
        $sentencia->bindParam(2, $idProducto);
        $sentencia->execute();
    }

    /**
     * Elimina un producto del carrito del usuario.
     * 
     * @param int $idUsuario El ID del usuario que elimina el producto.
     * @param int $idProducto El ID del producto que se elimina del carrito.
     */
    public function eliminarProductoCarrito($idUsuario, $idProducto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("DELETE FROM pedidos WHERE ID_Usuario = ? AND ID_Producto = ?");
        $sentencia->bindParam(1, $idUsuario);
        $sentencia->bindParam(2, $idProducto);
        $sentencia->execute();
    }

    /**
     * Obtiene todos los productos en el carrito de un usuario.
     * 
     * @param int $idUsuario El ID del usuario cuyo carrito se quiere consultar.
     * @return array Un array asociativo con todos los productos en el carrito del usuario.
     */
    public function getCarrito($idUsuario)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM pedidos WHERE ID_Usuario = ?");
        $sentencia->bindParam(1, $idUsuario);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
    }

    /**
     * Obtiene los detalles de un producto específico a partir de su ID.
     * 
     * @param int $idProducto El ID del producto a consultar.
     * @return array Un array asociativo con los detalles del producto.
     */
    public function obtenerProductoPorId($idProducto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM pedidos WHERE ID_Producto = ?");
        $sentencia->bindParam(1, $idProducto);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Comprueba si un usuario ya tiene productos en su carrito.
     * 
     * @return void Imprime un mensaje indicando si el carrito está vacío o si ya contiene productos.
     */
    public function comprobarCarrito()
    {
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
