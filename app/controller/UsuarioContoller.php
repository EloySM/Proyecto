<?php
require_once "../../app/model/usuarios.php";
require_once "../../config/dbConnection.php";

class UsuarioController
{


    function añadirUsuarios()
    {

        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado = htmlspecialchars($_POST['nombre']);
        $campoeUsuarioSaneado = htmlspecialchars($_POST['usuario']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['contraseña']);
      
        // Validar que el usuario no esté vacío

        if (empty($campoNombreSaneado) || empty($campoeUsuarioSaneado) || empty($campoContraseñaSaneado)) {
            echo "Todos los campos son obligatorios";
            // exit;
        }

        // Nos conectamos a la base de datos y hacemos el INSERT de los datos 
        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO usuario (Nombre, NombreUsuario, Contraseña) VALUES (?, ?, ?)");
        $sentencia->bindParam(1, $campoNombreSaneado);
        $sentencia ->bindParam(2, $campoeUsuarioSaneado);
        $sentencia->bindParam(3, $campoContraseñaSaneado);

        // Ejecutar la consulta
        if ($sentencia->execute()) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "Error al registrar el usuario: ";
        }
    }
}
