<?php


class favoritos{

        private $idFavorito;
        private $idUsuario;
        private $idProducto;


        public function __construct($idFavorito, $idUsuario, $idProducto){
                
                $this->idFavorito = $idFavorito;
                $this->idUsuario = $idUsuario;
                $this->idProducto = $idProducto;
        }
    
         //GETS 
    
         public function getidFavorito()
         {
     
             return $this->idFavorito;
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
         public function setIdFavorito($idFavorito)
         {
     
             $this->idFavorito = $idFavorito;
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