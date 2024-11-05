<?php
   require "../../app/model/usuarios.php";
   require "../../config/dbConnection.php";

   class UsuarioController{


        function añadirUsuarios(){

        // Nos aseguramos de que el usuario no nos introduzca scripts en ninguno de los campos
        $campoNombreSaneado =htmlspecialchars($_POST['nombre']);
        $campoContraseñaSaneado = htmlspecialchars($_POST['contraseña']);

        // Validar que el usuario no esté vacío
        
        if (empty($usuario) || empty($contraseña)) {
        echo "Usuario y contraseña son obligatorios.";
        // exit;
        }

        $conn = getDBConnection();
        $sentencia = $conn->prepare("INSERT INTO usuario (usuario, contraseña) VALUES (?, ?)");
        $sentencia->bindParam(1, $usuario);
        $sentencia->bindParam(2, $contraseña);


        }



   }






?>