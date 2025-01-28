<?php

require_once __DIR__ . '/../../config/dbConnection.php';

class Productos
{

    private $ID_Producto;
    private $nombre;
    private $precio;
    private $tipo;
    private $likes;


    public function __construct($ID_Producto, $nombre, $tipo, $precio, $likes)
    {
        $this->ID_Producto = $ID_Producto;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->likes = $likes;
    }
    //FUNCIONES PARA EL ADMINISTRADOR
    public function crearProducto()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->bindParam(2, $this->precio);

        if ($sentencia->execute()) {
            return "Producto creado correctamente";
        } else {
            return "Error al crear el producto";
        }
    }

    public function eliminarProducto()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("DELETE FROM productos WHERE ID_Producto = ?");
        $sentencia->bindParam(1, $this->ID_Producto);

        if ($sentencia->execute()) {
            return "Producto eliminado correctamente";
        } else {
            return "Error al eliminar el producto";
        }
    }


    public function modificarProducto()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("UPDATE productos SET nombre = ?, tipo = ?, precio = ? WHERE ID_Producto = ?");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->bindParam(2, $this->tipo);
        $sentencia->bindParam(3, $this->precio);
        $sentencia->bindParam(4, $this->ID_Producto);

        if ($sentencia->execute()) {
            return "Producto modificado correctamente";
        } else {
            return "Error al modificar el producto";
        }
    }


    //FUNCIONES PARA EL CLIENTE Y ADMIN
    public function obtenerProductos()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductosPorTipo($tipo)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos WHERE Tipo = :tipo");
        $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductoNombre()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos WHERE nombre = ?");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductoPorId($ID_Producto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos WHERE ID_Producto = ?");
        $sentencia->bindParam(1, $ID_Producto);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

}
