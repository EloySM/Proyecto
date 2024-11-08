<?php
require_once "../../app/model/usuarios.php";
require_once "../../config/dbConnection.php";

class UsuarioController
{
      
public function crearUsuario($campoNombreSaneado, $campoeUsuarioSaneado, $campoContraseñaSaneado){

     
        $usuario = new Usuario($campoNombreSaneado, $campoeUsuarioSaneado, $campoContraseñaSaneado);
        return ($usuario->UsuarioNuevo($campoNombreSaneado, $campoeUsuarioSaneado, $campoContraseñaSaneado));

}
   
}
