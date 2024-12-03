<?php

require_once "../../config/dbConnection.php";

class Like {

    private $idUsuario;
    private $idProducto;
    private $likesBoolean;

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getLikesBoolean() {
        return $this->likesBoolean;
    }

    public function setLikesBoolean($likesBoolean) {
        $this->likesBoolean = $likesBoolean;
    }

    public function save() {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO likes (idUsuario, idProducto, likesBoolean) VALUES (?, ?, ?)");
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->bindParam(2, $this->idProducto);
        $sentencia->bindParam(3, $this->likesBoolean);
        $sentencia->execute();
    }
}