<?php
require "../../config/dbConnection.php";

class Empleados
{

    private $idEmpleado;
    private $nombre;
    private $apellidos;
    private $esAdmin; //Igual no hace falta 

    public function __construct($idEmpleado, $nombre, $apellidos, $esAdmin)
    {
        $this->idEmpleado = $idEmpleado;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->esAdmin = $esAdmin;
    }




    //GETS 

    public function getidEmpleado()
    {

        return $this->idEmpleado;
    }


    public function getnombre()
    {

        return $this->nombre;
    }

    public function getApellidos()
    {

        return $this->apellidos;
    }

    public function getEsAdmin()
    {

        return $this->esAdmin;
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

    public function setEsAdmin($esAdmin) {

        $this->esAdmin=$esAdmin;

    }
}
