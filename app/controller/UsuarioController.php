<?php
require_once "../../app/model/usuarios.php";
require_once "../../config/dbConnection.php";

class UsuarioController
{
      
public function crearUsuario($campoNombreSaneado, $campoUsuarioSaneado, $campoContraseñaSaneado){

     
        $usuario = new Usuario(null ,$campoNombreSaneado, $campoUsuarioSaneado, $campoContraseñaSaneado);
        return ($usuario->UsuarioNuevo($campoNombreSaneado, $campoUsuarioSaneado, $campoContraseñaSaneado));

}



    function loginUsuario($usuario, $contraseña)
    {

        $usuario = new Usuario(null, null ,$usuario, $contraseña);
        return ($usuario->login($usuario, $contraseña));

    }
}
