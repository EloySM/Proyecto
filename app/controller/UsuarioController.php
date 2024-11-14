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

    function datosUsuario($usuario)
    {
        $usuario = new Usuario(null, null, $usuario, null);
        $datos = $usuario->getDatosUsaurio($usuario);
        if (!empty($datos)) {
            return $datos = $datos[0]; // Asumimos que solo hay un usuario con ese nombre de usuario
            
        } else {
            return "No se encontraron datos del usuario.";
        }
    }

    function logout()
    {
       Usuario::logoutUsuario();
    }

    function modificarUsuario( $id, $nombre, $usuario, $contraseña)
    {
        $usuario = new Usuario($id, $nombre, $usuario, $contraseña);
        return $usuario->modificarUsuario($id, $nombre, $usuario, $contraseña );
    }
    
}
