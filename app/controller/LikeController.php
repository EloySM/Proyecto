<?php

require "../model/Like.php";

class LikeController {

    private $idUsuario;
    private $idProducto;
    private $likesBoolean;

    public function __construct($idUsuario, $idProducto, $likesBoolean) {
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->likesBoolean = $likesBoolean;
    }

    public function darLike($idUsuario, $idProducto) {
        $like = new Like();
        $like->setIdUsuario($idUsuario);
        $like->setIdProducto($idProducto);
        $like->setLikesBoolean($this->likesBoolean);
        $like->save();
    }
}