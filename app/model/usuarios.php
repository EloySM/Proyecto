<?php

require_once '../../config/dbConnection.php';

class Usuario
{
    private $idUsuario;
    private $nombre;
    private $usuario;
    private $contraseña;


    public function __construct($idUsuario, $nombre,$usuario, $contraseña)
    {
        $this -> usuario =$idUsuario;
        $this -> nombre = $nombre;
        $this->contraseña =$contraseña;
        $this ->usuario =$usuario;
    }


    //GETS 

    public function getidUsuario()
    {

        return $this->idUsuario;
    }


    public function getNombre()
    {

        return $this->nombre;
    }

    public function getUsuario()
    {

        return $this->usuario;
    }

    public function getContraseña()
    {

        return $this->contraseña;
    }



    // SETERS
    public function setNombre($nombre)
    {

        $this->nombre = $nombre;
    }

    public function setUsuario($usuario)
    {

        $this->usuario = $usuario;
    }


    public function setContraseña($contraseña)
    {

        $this->contraseña = $contraseña;
    }


    function UsuarioNuevo()
    {

        // Nos conectamos a la base de datos y hacemos el INSERT de los datos 
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO usuario (Nombre, NombreUsuario, Contraseña) VALUES (?, ?, ?)");
        $sentencia->bindParam(1, $this -> nombre);
        $sentencia->bindParam(2, $this -> usuario);
        $sentencia->bindParam(3, $this -> contraseña);

        // Ejecutar la consulta
        if ($sentencia->execute()) {
            echo "Usuario registrado exitosamente.";
            return true;
        } else {
            echo "Error al registrar el usuario: ";
            return false;
        }
    }
    public function login($usuario, $contraseña) {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE NombreUsuario = ? AND Contraseña = ?");
        $sentencia->bindParam(1, $this->usuario);
        $sentencia->bindParam(2, $this->contraseña);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}