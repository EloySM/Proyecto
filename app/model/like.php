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

    // GETS

    public function getIdUsuario()
    {

        return $this->idUsuario;
    }

    public function getId_Producto()
    {

        return $this->idProducto;
    }

    // SETS
    public function setIdUsuario($idUsuario)
    {

        $this->idUsuario = $idUsuario;
    }

    public function setIdProducto($idProducto)
    {

        $this->idProducto = $idProducto;
    }


    public function darLike($idUsuario, $idProducto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = "INSERT INTO likes (ID_Usuario, ID_Producto) VALUES (?, ?)";
            $stmt = $conn->prepare($sentencia);
            $stmt->bindParam(1, $idUsuario);
            $stmt->bindParam(2, $idProducto);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function quitarLike($idUsuario, $idProducto)
    {
        $conn = getDBConnection();
        $sentencia = "DELETE FROM likes WHERE idUsuario = ? AND idProducto = ?";
        $stmt = $conn->prepare($sentencia);
        $stmt->bindParam(1, $this->$idUsuario);
        $stmt->bindParam(2, $this->$idProducto);
        $stmt->execute();
    }

    public function getLikes($idProducto)
    {
        $conn = getDBConnection();
        $sentencia = "SELECT COUNT(*) FROM likes WHERE idProducto = ?";
        $stmt = $conn->prepare($sentencia);
        $stmt->bindParam(1, $this->$idProducto);
        $stmt->execute();
        $likes = $stmt->fetch();
        return $likes;
    }

    public function masLikes()
    {
        $conn = getDBConnection();
        // SELECT idProducto, COUNT(*) AS totalLikes FROM likes GROUP BY idProducto ORDER BY totalLikes DESC LIMIT 4;
        $sentencia = $conn->prepare("SELECT p.ID_Producto, p.Nombre, p.Precio, p.ruta AS Imagen,COUNT(l.ID_Producto) AS TotalLikes FROM productos p JOIN likes l ON p.ID_Producto = l.ID_Producto GROUP BY p.ID_Producto, p.Nombre, p.Precio, p.ruta ORDER BY TotalLikes DESC LIMIT 4;");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}
