<?php

class Usuario{


    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $contraseña;


        //GETS 

        public function getidUsuario()
        {
    
            return $this->idUsuario;
        }
    
    
        public function getnombre()
        {
    
            return $this->nombre;
        }
    
        public function getApellidos()
        {
    
            return $this->apellidos;
        }
    
        public function getContraseña()
        {
    
            return $this->contraseña;
        }
    
    
    
        // SETERS
        public function setNombre($nombre)
        {
    
            $this->nombre = $nombre;
        }
    
        public function setApellidos($apellidos)
        {
    
            $this->apellidos = $apellidos;
        }
    
        public function setEsAdmin($contraseña) {
    
            $this->contraseña=$contraseña;
    
        }



}




?>