<?php
require_once __DIR__ . '/../model/usuarios.php';
require_once __DIR__ . '/../../config/dbConnection.php';

/**
 *
 * Clase UsuarioController
 *
 * Esta clase maneja las acciones relacionadas con el usuario, como la creación, modificación,
 * login, logout y obtención de datos del usuario.
 * 
 * @package Controller
 * 
 */
class UsuarioController
{

    /**
     * Crea un nuevo usuario.
     * 
     * @param string $nombre El nombre del usuario.
     * @param string $usuario El nombre de usuario.
     * @param string $contraseña La contraseña del usuario.
     * 
     * @return string Mensaje de éxito o error al crear el usuario.
     */
    public function crearUsuario($nombre, $usuario, $contraseña)
    {
        $usuario = new Usuario(null, $nombre, $usuario, $contraseña, null);
        return ($usuario->UsuarioNuevo($nombre, $usuario, $contraseña));
    }

    /**
     * Inicia sesión de un usuario.
     * 
     * @param string $usuario El nombre de usuario.
     * @param string $contraseña La contraseña del usuario.
     * 
     * @return mixed Resultado de la autenticación, generalmente un mensaje o los datos del usuario.
     */
    function loginUsuario($usuario, $contraseña)
    {
        $usuario = new Usuario(null, null, $usuario, $contraseña, null);
        return ($usuario->login($usuario, $contraseña));
    }

    /**
     * Obtiene los datos de un usuario por su nombre de usuario.
     * 
     * @param string $usuario El nombre de usuario.
     * 
     * @return array|string Datos del usuario o un mensaje de error si no se encuentran datos.
     */
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

    /**
     * Cierra la sesión del usuario.
     */
    function logout()
    {
        Usuario::logoutUsuario();
    }

    /**
     * Modifica los datos de un usuario existente.
     * 
     * @param int $id El ID del usuario a modificar.
     * @param string $nombre El nuevo nombre del usuario.
     * @param string $usuario El nuevo nombre de usuario.
     * @param string $contraseña La nueva contraseña del usuario.
     * 
     * @return string Mensaje de éxito o error al modificar el usuario.
     */
    function modificarUsuario($id, $nombre, $usuario, $contraseña)
    {
        $usuario = new Usuario($id, $nombre, $usuario, $contraseña, null);
        return $usuario->modificarUsuario($id, $nombre, $usuario, $contraseña);
    }

    /**
     * Verifica si un usuario existe.
     * 
     * @param string $usuario El nombre de usuario a verificar.
     * 
     * @return bool `true` si el usuario existe, `false` en caso contrario.
     */
    function existeUsuario($usuario)
    {
        $usuario = new Usuario(null, null, $usuario, null, null);
        return $usuario->existeUsuario($usuario);
    }
}
?>
