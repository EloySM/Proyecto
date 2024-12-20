<?php
require_once "../../config/dbConnection.php";

class like
{

    private $idUsuario;
    private $idProducto;

    public function __construct($idUsuario, $idProducto)
    {

        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    public function alternarLike($idUsuario, $idProducto)
    {
        try {
            $conn = getDBConnection();
            
            // Verificar si ya existe el like en la base de datos
            $sentencia = "SELECT COUNT(*) FROM likes WHERE ID_Usuario = ? AND ID_Producto = ?";
            $stmt = $conn->prepare($sentencia);
            $stmt->bindParam(1, $idUsuario);
            $stmt->bindParam(2, $idProducto);
            $stmt->execute();
            $likeExiste = $stmt->fetchColumn();

            // Si existe, quitar el like
            if ($likeExiste > 0) {
                $sentenciaDelete = "DELETE FROM likes WHERE ID_Usuario = ? AND ID_Producto = ?";
                $stmtDelete = $conn->prepare($sentenciaDelete);
                $stmtDelete->bindParam(1, $idUsuario);
                $stmtDelete->bindParam(2, $idProducto);
                $stmtDelete->execute();
                return "Like eliminado.";
            } else { // Si no existe, dar el like
                $sentenciaInsert = "INSERT INTO likes (ID_Usuario, ID_Producto) VALUES (?, ?)";
                $stmtInsert = $conn->prepare($sentenciaInsert);
                $stmtInsert->bindParam(1, $idUsuario);
                $stmtInsert->bindParam(2, $idProducto);
                $stmtInsert->execute();
                return "Like agregado.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getLikes($idProducto)
    {
        $conn = getDBConnection();
        $sentencia = "SELECT COUNT(*) FROM likes WHERE idProducto = ?";
        $stmt = $conn->prepare($sentencia);
        $stmt->bindParam(1, $idProducto);
        $stmt->execute();
        $likes = $stmt->fetchColumn();
        return $likes;
    }

    public function masLikes()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT p.ID_Producto, p.Nombre, p.Precio, p.ruta, COUNT(l.ID_Producto) AS TotalLikes 
                                 FROM productos p 
                                 LEFT JOIN likes l ON p.ID_Producto = l.ID_Producto 
                                 GROUP BY p.ID_Producto, p.Nombre, p.Precio, p.ruta 
                                 ORDER BY TotalLikes DESC 
                                 LIMIT 4;");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
