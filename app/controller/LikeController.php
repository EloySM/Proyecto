<?php
// session_start();
require_once "../../app/model/like.php";

class LikeController
{
    public function darlike()
    {
        $ID_Usuario = $_SESSION['id'];
        $ID_Producto = $_POST['product_id'];
        $like = new Like(null, $ID_Usuario, $ID_Producto);
        $like->darLike($ID_Usuario, $ID_Producto);

        // header('Location: index.php?controller=products&action=showProducts');
    }
}




?>