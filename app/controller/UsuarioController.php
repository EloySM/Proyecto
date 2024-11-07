<?php

require_once '../../config/dbConnection.php';
require_once '../model/usuarios.php';

class UsuarioController
{

    function loginUsuario($nombre, $contraseña)
    {

        $usuario = new Usuario($nombre, $contraseña);
        return ($usuario->login($nombre, $contraseña));

    }
}
