<?php

require_once '../../app/model/formulario.php';

/**
 * Controlador que maneja las solicitudes relacionadas con el formulario de registro.
 * @package Controller
 */
class FormularioController
{
    /**
     * Maneja el registro de un nuevo formulario.
     * 
     * Este método crea una instancia de la clase `formulario` con los datos proporcionados y guarda
     * los datos del formulario en la base de datos llamando al método `guardarFormulario`.
     * 
     * @param int $idUsuario El identificador del usuario que está enviando el formulario.
     * @param string $nombre El nombre del usuario.
     * @param string $apellido El apellido del usuario.
     * @param string $empresa El nombre de la empresa del usuario.
     * @param string $email El correo electrónico del usuario.
     * @param string $movil El número de móvil del usuario.
     * @param string $asunto El asunto del mensaje enviado en el formulario.
     * @param string $mensaje El mensaje enviado por el usuario.
     */
    public function formularioRegistro($idUsuario, $nombre, $apellido, $empresa, $email, $movil, $asunto, $mensaje)
    {
        // Crea una nueva instancia de la clase formulario con los datos proporcionados
        $formulario = new formulario($nombre, $apellido, $empresa, $email, $movil, $asunto, $mensaje);
        
        // Guarda el formulario en la base de datos utilizando el ID de usuario
        $formulario->guardarFormulario($idUsuario);
    }
}
?>
