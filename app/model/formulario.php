<?php

require_once "../../config/dbConnection.php";

/**
 * Clase que maneja el formulario de contacto y guarda los datos en la base de datos
 * @package Model
 */
class formulario {
    /**
     * @var int Identificador del usuario que envía el formulario.
     */
    private $idUsuario;
    
    /**
     * @var string Nombre del usuario.
     */
    private $nombre;
    
    /**
     * @var string Apellido del usuario.
     */
    private $apellido;
    
    /**
     * @var string Empresa del usuario.
     */
    private $empresa;
    
    /**
     * @var string Correo electrónico del usuario.
     */
    private $email;
    
    /**
     * @var string Número de móvil del usuario.
     */
    private $movil;
    
    /**
     * @var string Asunto del mensaje del formulario.
     */
    private $asunto;
    
    /**
     * @var string Mensaje enviado por el usuario.
     */
    private $mensaje;

    /**
     * Constructor de la clase formulario.
     * 
     * @param string $nombre Nombre del usuario.
     * @param string $apellido Apellido del usuario.
     * @param string $empresa Nombre de la empresa del usuario.
     * @param string $email Correo electrónico del usuario.
     * @param string $movil Número de móvil del usuario.
     * @param string $asunto Asunto del mensaje del formulario.
     * @param string $mensaje Mensaje enviado por el usuario.
     */
    public function __construct($nombre, $apellido, $empresa, $email, $movil, $asunto, $mensaje) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->empresa = $empresa;
        $this->email = $email;
        $this->movil = $movil;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    /**
     * Guarda los datos del formulario en la base de datos.
     * 
     * Este método toma el identificador de usuario como parámetro y almacena los datos 
     * del formulario en la tabla "formularios" de la base de datos.
     * 
     * @param int $idUsuario El identificador del usuario que envía el formulario.
     * 
     * @return bool Retorna true si el formulario fue enviado correctamente, false en caso contrario.
     */
    public function guardarFormulario($idUsuario) {
        $this->idUsuario = $idUsuario;

        // Establece la conexión a la base de datos
        $conn = getDBConnection();

        // Prepara la sentencia SQL para insertar los datos
        $sentencia = $conn->prepare("INSERT INTO formularios (ID_Usuario, Nombre, Apellido, Empresa, Email, Movil, Asunto, Mensaje) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Asocia los parámetros con los valores del formulario
        $sentencia->bindParam(1, $this->idUsuario);
        $sentencia->bindParam(2, $this->nombre);
        $sentencia->bindParam(3, $this->apellido);
        $sentencia->bindParam(4, $this->empresa);
        $sentencia->bindParam(5, $this->email);
        $sentencia->bindParam(6, $this->movil);
        $sentencia->bindParam(7, $this->asunto);
        $sentencia->bindParam(8, $this->mensaje);

        // Ejecuta la sentencia y verifica si fue exitosa
        if ($sentencia->execute()) {
            echo "Formulario enviado";
            return true;
        } else {
            echo "Error al enviar el formulario";
            return false;
        }
    }
}
?>
