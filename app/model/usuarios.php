<?php

require_once __DIR__ . '/../../config/dbConnection.php';

/**
 * Clase Usuario
 *
 * 
 * Esta clase maneja las operaciones relacionadas con los usuarios, tales como registro, login, 
 * modificación de datos y cierre de sesión.
 * 
 *  @package Model
 */
class Usuario
{
    private $idUsuario;
    private $nombre;
    private $usuario;
    private $contraseña;
    private $esAdmin;

    /**
     * Constructor de la clase Usuario.
     * 
     * @param int $idUsuario El ID del usuario.
     * @param string $nombre El nombre completo del usuario.
     * @param string $usuario El nombre de usuario para login.
     * @param string $contraseña La contraseña del usuario.
     * @param bool $esAdmin Indica si el usuario es administrador.
     */
    public function __construct($idUsuario, $nombre, $usuario, $contraseña, $esAdmin)
    {
        $this -> idUsuario = $idUsuario;
        $this -> nombre = $nombre;
        $this->contraseña = $contraseña;
        $this ->usuario = $usuario;
        $this -> esAdmin = $esAdmin;
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     * 
     * @return bool Retorna true si el registro fue exitoso, false en caso contrario.
     */
    function UsuarioNuevo()
    {
        // Nos conectamos a la base de datos y hacemos el INSERT de los datos 
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO usuario (Nombre, NombreUsuario, Contraseña) VALUES (?, ?, ?)");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->bindParam(2, $this->usuario);
        $sentencia->bindParam(3, $this->contraseña);

        // Ejecutar la consulta
        if ($sentencia->execute()) {
            echo "Usuario registrado exitosamente.";
            return true;
        } else {
            echo "Error al registrar el usuario: ";
            return false;
        }
    }

    /**
     * Realiza el login de un usuario verificando su nombre de usuario y contraseña.
     * 
     * @return array Retorna un array con los datos del usuario (si no existe el usuario el array estara vacio)
     */
    public function login()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE NombreUsuario = ? AND Contraseña = ?");
        $sentencia->bindParam(1, $this->usuario);
        $sentencia->bindParam(2, $this->contraseña);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Obtiene los datos del usuario basado en su nombre de usuario.
     * 
     * @return array Los datos del usuario.
     */
    public function getDatosUsaurio()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT * FROM usuario WHERE NombreUsuario = ?");
        $sentencia->bindParam(1, $this->usuario);
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Cierra la sesión del usuario.
     * 
     * Redirige al usuario a la página de inicio de sesión tras cerrar la sesión.
     */
    public static function logoutUsuario()
    {
        session_start();
        session_unset(); // Elimina todas las variables de sesión
        session_destroy(); // Destruye la sesión
        header("Location: http://johnni-willi.local/"); // Redirige al usuario a la página de inicio de sesión
        exit();
    }

    /**
     * Modifica los datos de un usuario.
     * 
     * @return bool Retorna true si la modificación fue exitosa, false en caso contrario.
     */
    public function modificarUsuario()
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

    /**
     * Verifica si un nombre de usuario ya existe en la base de datos.
     * 
     * @return bool Retorna true si el usuario ya existe, false en caso contrario.
     */
    public function existeUsuario()
    {
        $conn = getDBConnection();
        $sentencia = $conn->prepare("SELECT COUNT(*) FROM usuario WHERE NombreUsuario = ?");
        $sentencia->bindParam(1, $this->usuario);
        $sentencia->execute();
        $count = $sentencia->fetchColumn();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
}
