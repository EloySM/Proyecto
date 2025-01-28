<?php

require_once "../../config/dbConnection.php";

class favorito
{
    private $idUsuario;
    private $idProducto;

    public function __construct($idUsuario, $idProducto)
    {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    public function addFavorito() {
        
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO favorito (ID_Usuario, ID_Producto) VALUES (?, ?)");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->bindParam(2, $this->idProducto);

        if($sentencia->execute()) {
            echo "Producto añadido a Favoritos";
            return true;
        } else {
            echo "Error al añadir el producto";
            return false;
        }
    }

    public function deleteFavorito() {
        $conn =getDBConnection();
        $sentencia = $conn->prepare("DELETE FROM favorito WHERE ID_Usuario = ? AND ID_Producto = ?");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->bindParam(2, $this->idProducto);

        if($sentencia->execute()) {
            echo "Producto eliminado de Favoritos";
            return true;
        } else {
            echo "Error al eliminar el producto";
            return false;
        }
    }

    public function getFavoritos() {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM favorito WHERE ID_Usuario = ?");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
