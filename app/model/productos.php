<?php
require "../../config/dbConnection.php";

class Productos
{

    private $idProducto;
    private $nombre;
    private $precio;
    private $tipo;
    private $likes;


    public function __construct($idProducto, $nombre, $tipo, $precio, $likes)
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->likes = $likes;
    }



    //GETS 

    public function getidProducto()
    {

        return $this->idProducto;
    }


    public function getnombre()
    {

        return $this->nombre;
    }

    public function getPrecio()
    {

        return $this->precio;
    }

    public function getTipo()
    {

        return $this->tipo;
    }

    public function getLikes()
    {

        return $this->likes;
    }




    // SETERS
    public function setNombre($nombre)
    {

        $this->nombre = $nombre;
    }

    public function setPrecio($precio)
    {

        $this->precio = $precio;
    }

    public function setTipo($tipo)
    {

        $this->tipo = $tipo;
    }


    public function setLikes($likes)
    {

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
        $sentencia = $conn->prepare("DELETE FROM productos WHERE idProducto = ?");
        $sentencia->bindParam(1, $this->idProducto);

        if ($sentencia->execute()) {
            return "Producto eliminado correctamente";
        } else {
            return "Error al eliminar el producto";
        }
    }

    public function actualizarProducto()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("UPDATE productos SET nombre = ?, precio = ? WHERE idProducto = ?");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->bindParam(2, $this->precio);
        $sentencia->bindParam(3, $this->idProducto);

        if ($sentencia->execute()) {
            return "Producto actualizado correctamente";
        } else {
            return "Error al actualizar el producto";
        }
    }


    public function modificarProducto($idProducto, $nombre, $precio)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("UPDATE productos SET nombre = ?, precio = ? WHERE idProducto = ?");
        $sentencia->bindParam(1, $nombre);
        $sentencia->bindParam(2, $precio);
        $sentencia->bindParam(3, $idProducto);

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
}
