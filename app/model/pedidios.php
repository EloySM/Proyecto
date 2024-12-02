<?php


class Pedidos{

    private $idPedido;
    private $idUsuario;
    private $idProducto;




    public function __construct($idPedido, $idUsuario, $idProducto){
            
            $this->idPedido = $idPedido;
            $this->idUsuario = $idUsuario;
            $this->idProducto = $idProducto;
    }

     //GETS 

     public function getidPedido()
     {
 
         return $this->idPedido;
     }
 
 
     public function getIdUsuario()
     {
 
         return $this->idUsuario;
     }
 
     public function getId_Producto()
     {
 
         return $this->idProducto;
     }

 
 
     // SETERS
     public function setIdPedido($idPedido)
     {
 
         $this->idPedido = $idPedido;
     }
 
     public function setIdUsuario($idUsuario)
     {
 
         $this->idUsuario = $idUsuario;
     }
 
     public function setIdProducto($idProducto) {
 
         $this->idProducto=$idProducto;
 
     }
}

?>