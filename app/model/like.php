<?php
require_once "../../config/dbConnection.php";

class like {

    private $idUsuario;
    private $idProducto;

    public function __construct($idUsuario, $idProducto){
            
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
    
        public function setIdProducto($idProducto) {
    
            $this->idProducto=$idProducto;
    
        }


        public function darLike($idUsuario, $idProducto){
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

        public function quitarLike($idUsuario, $idProducto){
            $conn = getDBConnection();
            $sentencia = "DELETE FROM likes WHERE idUsuario = ? AND idProducto = ?";
            $stmt = $conn->prepare($sentencia);
            $stmt->bindParam(1, $this -> $idUsuario);
            $stmt->bindParam(2, $this -> $idProducto);
            $stmt->execute();   
        }

        public function getLikes($idProducto){
            $conn = getDBConnection();
            $sentencia = "SELECT COUNT(*) FROM likes WHERE idProducto = ?";
            $stmt = $conn->prepare($sentencia);
            $stmt->bindParam(1, $this -> $idProducto);
            $stmt->execute();   
            $likes = $stmt->fetch();
            return $likes;
        }
     

}


?>