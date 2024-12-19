<?php
// session_start();
require_once "../../app/model/like.php";

class LikeController
{
    public function darQuitarlike()
    {
        $ID_Usuario = $_SESSION['id'];
        $ID_Producto = $_POST['product_id'];
        $like = new Like(null, $ID_Usuario, $ID_Producto);
        $like->alternarLike($ID_Usuario, $ID_Producto);
    }

    public function mostrarConMasLikes() {
        $like = new like(null, null);
        return $like->masLikes();
    }
}




?>