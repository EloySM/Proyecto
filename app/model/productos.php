<?php
require "../../config/dbConnection.php";

class Productos{

    private $idProducto;
    private $nombre;
    private $precio;
    
    
    //GETS 
    
    public function getidProducto(){

        return $this -> idProducto;

    }


    public function getnombre(){

        return $this -> nombre;

    }
    
    public function getPrecio(){

        return $this -> precio;

    }


    // SETERS
    public function setNombre($nombre){

        $this ->nombre = $nombre;

    }

    public function setPrecio($precio){

        $this->precio = $precio;

    }

}







?>