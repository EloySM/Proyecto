<?php

require_once '../../config/dbConnection.php';

/**
 * 
 * Clase Deseado
 *
 * Esta clase maneja los productos añadidos a la lista de "deseados" de un usuario.
 * Permite agregar, eliminar y obtener los productos en la lista de deseados de un usuario.
 * 
 * @package Model
 * 
 */
class deseado {

    private $idUsuario;
    private $idProducto;

    /**
     * Constructor de la clase Deseado.
     * 
     * @param int $idUsuario El ID único del usuario.
     * @param int $idProducto El ID único del producto.
     */
    public function __construct($idUsuario, $idProducto)
    {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    /**
     * Añade un producto a la lista de deseados de un usuario.
     * 
     * @return bool Retorna `true` si el producto se añadió correctamente, `false` si hubo un error.
     */
    public function addDeseado()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO deseado (ID_Usuario, ID_Producto) VALUES (?, ?)");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->bindParam(2, $this->idProducto);

        if ($sentencia->execute()) {
            echo "Producto añadido a la lista de deseados.";
            return true;
        } else {
            echo "Error al añadir el producto a la lista de deseados: ";
            return false;
        }
    }

    /**
     * Elimina un producto de la lista de deseados de un usuario.
     * 
     * @return bool Retorna `true` si el producto se eliminó correctamente, `false` si hubo un error.
     */
    public function deleteDeseado()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("DELETE FROM deseado WHERE ID_Usuario = ? AND ID_Producto = ?");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->bindParam(2, $this->idProducto);

        if ($sentencia->execute()) {
            echo "Producto eliminado de la lista de deseados.";
            return true;
        } else {
            echo "Error al eliminar el producto de la lista de deseados: ";
            return false;
        }
    }

    /**
     * Obtiene todos los productos deseados por un usuario.
     * 
     * @return array Un array con todos los productos deseados por el usuario.
     */
    public function getDeseados()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM deseado WHERE ID_Usuario = ?");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
