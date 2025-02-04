<?php

require_once __DIR__ . '/../../config/dbConnection.php';

/**
 * Clase Productos
 * 
 * 
 * Esta clase maneja las operaciones relacionadas con los productos, tales como crear, modificar, eliminar,
 * y obtener productos, ya sea todos, por tipo o por nombre.
 * 
 * @package Model
 */
class Productos
{
    private $ID_Producto;
    private $nombre;
    private $precio;
    private $tipo;
    private $likes;

    /**
     * Constructor de la clase Productos.
     * 
     * @param int $ID_Producto El ID del producto.
     * @param string $nombre El nombre del producto.
     * @param string $tipo El tipo de producto.
     * @param float $precio El precio del producto.
     * @param int $likes La cantidad de "likes" que tiene el producto.
     */
    public function __construct($ID_Producto, $nombre, $tipo, $precio, $likes)
    {
        $this->ID_Producto = $ID_Producto;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->likes = $likes;
    }

    // FUNCIONES PARA EL ADMINISTRADOR

    /**
     * Crea un nuevo producto en la base de datos.
     * 
     * @return string Mensaje de éxito o error.
     */
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

    /**
     * Elimina un producto de la base de datos.
     * 
     * @return string Mensaje de éxito o error.
     */
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

    /**
     * Modifica un producto existente en la base de datos.
     * 
     * @return string Mensaje de éxito o error.
     */
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

    // FUNCIONES PARA EL CLIENTE Y ADMIN

    /**
     * Obtiene todos los productos de la base de datos.
     * 
     * @return array Un array asociativo con todos los productos.
     */
    public function obtenerProductos()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene los productos filtrados por tipo.
     * 
     * @param string $tipo El tipo de producto a filtrar.
     * @return array Un array asociativo con los productos que coinciden con el tipo.
     */
    public function obtenerProductosPorTipo($tipo)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos WHERE Tipo = :tipo");
        $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un producto por su nombre.
     * 
     * @return array Un array asociativo con los productos que coinciden con el nombre.
     */
    public function obtenerProductoNombre()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos WHERE nombre = ?");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un producto por su ID.
     * 
     * @param int $ID_Producto El ID del producto a obtener.
     * @return array Un array asociativo con el producto correspondiente al ID.
     */
    public function obtenerProductoPorId($ID_Producto)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM productos WHERE ID_Producto = ?");
        $sentencia->bindParam(1, $ID_Producto);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
}
