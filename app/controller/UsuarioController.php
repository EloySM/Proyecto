<?php
require_once __DIR__ . '/../model/usuarios.php';
require_once __DIR__ . '/../../config/dbConnection.php';

class UsuarioController
{

    public function crearUsuario($nombre, $usuario, $contraseña)
    {
        $usuario = new Usuario(null, $nombre, $usuario, $contraseña, null);
        return ($usuario->UsuarioNuevo($nombre, $usuario, $contraseña));
    }

    function loginUsuario($usuario, $contraseña)
    {
        $usuario = new Usuario(null, null, $usuario, $contraseña, null);
        return ($usuario->login($usuario, $contraseña));
    }

    function datosUsuario($usuario)
    {
        $usuario = new Usuario(null, null, $usuario, null, null);
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

    function modificarUsuario($id, $nombre, $usuario, $contraseña)
    {
        $usuario = new Usuario($id, $nombre, $usuario, $contraseña, null);
        return $usuario->modificarUsuario($id, $nombre, $usuario, $contraseña);
    }

    function existeUsuario($usuario)
    {
        $usuario = new Usuario(null, null, $usuario, null, null);
        return $usuario->existeUsuario($usuario);
    }
}