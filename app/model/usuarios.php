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
        $this -> idUsuario =$idUsuario;
        $this -> nombre = $nombre;
        $this ->usuario =$usuario;
        $this->contraseña =$contraseña;
        
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
    public function login() {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE NombreUsuario = ? AND Contraseña = ?");
        $sentencia->bindParam(1, $this->usuario);
        $sentencia->bindParam(2, $this->contraseña);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDatosUsaurio() {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE NombreUsuario = ?");
        $sentencia->bindParam(1, $this->usuario);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public static function logoutUsuario()
    {
        session_start();
        session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: http://johnni-willi.local/"); // Redirige al usuario a la página de inicio de sesión
        exit();
    }

    public function modificarUsuario($id, $nombre, $usuario, $contraseña)
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("UPDATE usuario SET Nombre = ?, NombreUsuario = ?, Contraseña = ? WHERE ID_Usuario = ?");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->bindParam(2, $this->usuario);
        $sentencia->bindParam(3, $this->contraseña);
        $sentencia->bindParam(4, $this->idUsuario);
        

        if ($sentencia->execute()) {
            echo "Usuario modificado exitosamente.";
            return true;
        } else {
            echo "Error al modificar el usuario: " . implode(", ", $sentencia->errorInfo());
            return false;
        }
    }

}