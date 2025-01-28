<?php

require_once '../../config/dbConnection.php';

class deseado{

    private $idUsuario;
    private $idProducto;
    
    public function __construct($idUsuario, $idProducto)
    {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

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