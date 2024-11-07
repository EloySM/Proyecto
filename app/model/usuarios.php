<?php

require_once '../../config/dbConnection.php';

class Usuario
{


    // private $idUsuario;
    private $nombre;
    // private $apellidos;
    private $contraseña;

    public function __construct($nombre, $contraseña)
    {
        // $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        // $this->apellidos = $apellidos;
        $this->contraseña = $contraseña;
    }



    //GETS 

    // public function getidUsuario()
    // {

    //     return $this->idUsuario;
    // }


    public function getnombre()
    {

        return $this->nombre;
    }

    // public function getApellidos()
    // {

    //     return $this->apellidos;
    // }

    public function getContraseña(){
        return $this->contraseña;
    }

    //     return $this->contraseña;
    // }



    // SETERS
    public function setNombre($nombre)
    {

        $this->nombre = $nombre;
    }

    // public function setApellidos($apellidos)
    // {

    //     $this->apellidos = $apellidos;
    // }

    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

    public function login($nombre, $contraseña) {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE NombreUsuario = ? AND Contraseña = ?");
        $sentencia->bindParam(1, $nombre);
        $sentencia->bindParam(2, $contraseña);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
