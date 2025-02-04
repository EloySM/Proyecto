<?php

require_once "../../config/dbConnection.php";

/**
 * Clase Favorito
 * 
 * 
 * Esta clase maneja las operaciones relacionadas con la lista de productos "favoritos" de los usuarios.
 * Permite añadir, eliminar y obtener productos de la lista de favoritos de un usuario.
 * 
 * @package Model
 */
class favorito
{
    private $idUsuario;   // ID del usuario
    private $idProducto;  // ID del producto

    /**
     * Constructor de la clase favorito.
     * 
     * @param int $idUsuario  ID del usuario.
     * @param int $idProducto ID del producto.
     */
    public function __construct($idUsuario, $idProducto)
    {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    /**
     * Añade un producto a la lista de favoritos de un usuario.
     * 
     * Inserta un registro en la base de datos para asociar un producto con un usuario en su lista de favoritos.
     * 
     * @return bool True si el producto fue añadido correctamente, false si ocurrió un error.
     */
    public function addFavorito() {
        $conn = getDBConnection(); // Conexión a la base de datos
        $sentencia = $conn->prepare("INSERT INTO favorito (ID_Usuario, ID_Producto) VALUES (?, ?)");
        $sentencia->bindParam(1, $this->idUsuario); // Asocia el ID del usuario
        $sentencia->bindParam(2, $this->idProducto); // Asocia el ID del producto

        if($sentencia->execute()) {
            echo "Producto añadido a Favoritos";
            return true; // Retorna true si la ejecución fue exitosa
        } else {
            echo "Error al añadir el producto";
            return false; // Retorna false si ocurrió un error
        }
    }

    /**
     * Elimina un producto de la lista de favoritos de un usuario.
     * 
     * Elimina un registro en la base de datos que asocia un producto con un usuario en su lista de favoritos.
     * 
     * @return bool True si el producto fue eliminado correctamente, false si ocurrió un error.
     */
    public function deleteFavorito() {
        $conn = getDBConnection(); // Conexión a la base de datos
        $sentencia = $conn->prepare("DELETE FROM favorito WHERE ID_Usuario = ? AND ID_Producto = ?");
        $sentencia->bindParam(1, $this->idUsuario); // Asocia el ID del usuario
        $sentencia->bindParam(2, $this->idProducto); // Asocia el ID del producto

        if($sentencia->execute()) {
            echo "Producto eliminado de Favoritos";
            return true; // Retorna true si la ejecución fue exitosa
        } else {
            echo "Error al eliminar el producto";
            return false; // Retorna false si ocurrió un error
        }
    }

    /**
     * Obtiene los productos favoritos de un usuario.
     * 
     * Realiza una consulta para obtener todos los productos que un usuario tiene en su lista de favoritos.
     * 
     * @return array Lista de productos favoritos del usuario.
     */
    public function getFavoritos() {
        $conn = getDBConnection(); // Conexión a la base de datos
        $sentencia = $conn->prepare("SELECT * FROM favorito WHERE ID_Usuario = ?");
        $sentencia->bindParam(1, $this->idUsuario); // Asocia el ID del usuario
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC); // Obtiene todos los productos favoritos
        return $result; // Retorna la lista de productos favoritos
    }
}
?>
