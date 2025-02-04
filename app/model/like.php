<?php
require_once "../../config/dbConnection.php";

/**
 * Clase Like
 * 
 *
 * Esta clase gestiona las operaciones relacionadas con los "likes" de los productos, 
 * permitiendo a los usuarios dar y quitar likes a los productos, así como obtener la cantidad de likes.
 * 
 * @package Model
 */
class like
{
    private $idUsuario;
    private $idProducto;

    /**
     * Constructor de la clase Like.
     *
     * @param int $idUsuario El ID del usuario que da o quita el like.
     * @param int $idProducto El ID del producto que recibe el like.
     */
    public function __construct($idUsuario, $idProducto)
    {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
    }

    /**
     * Alterna el estado de like de un producto. Si el usuario ya ha dado like, se elimina; 
     * de lo contrario, se agrega un nuevo like.
     * 
     * @param int $idUsuario El ID del usuario que da o quita el like.
     * @param int $idProducto El ID del producto al que se le da o quita el like.
     * @return string Mensaje indicando si el like fue agregado o eliminado.
     */
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

    /**
     * Obtiene la cantidad total de likes de un producto.
     * 
     * @param int $idProducto El ID del producto para el cual se quieren obtener los likes.
     * @return int Número de likes del producto.
     */
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

    /**
     * Obtiene los 4 productos con más likes.
     * 
     * @return array Un array asociativo con los productos que tienen más likes, 
     *               incluyendo su ID, nombre, precio, ruta y el número total de likes.
     */
    public function masLikes()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT p.ID_Producto, p.Nombre, p.Precio, p.ruta, COUNT(l.ID_Producto) AS TotalLikes 
                                 FROM productos p 
                                 LEFT JOIN likes l ON p.ID_Producto = l.ID_Producto 
                                 GROUP BY p.ID_Producto, p.Nombre, p.Precio, p.ruta 
                                 HAVING TotalLikes > 0
                                 ORDER BY TotalLikes DESC 
                                 LIMIT 4;");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
}
