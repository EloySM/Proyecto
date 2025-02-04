<?php
require_once "../../app/model/like.php";

/**
 * Clase LikeController
 * 
 * 
 * Esta clase maneja las operaciones relacionadas con los "likes" de los productos por parte de los usuarios.
 * @package Controller
 */
class LikeController
{
    /**
     * Alterna el estado del "like" de un producto por parte de un usuario.
     * 
     * Si el usuario ya dio "like", lo eliminará, y si no lo ha dado, lo agregará.
     * 
     * @return void
     */
    public function darQuitarlike()
    {
        $ID_Usuario = $_SESSION['id']; // Obtiene el ID del usuario desde la sesión
        $ID_Producto = $_POST['product_id']; // Obtiene el ID del producto desde la solicitud
        $like = new Like(null, $ID_Usuario, $ID_Producto);
        $like->alternarLike($ID_Usuario, $ID_Producto);
    }

    /**
     * Muestra los productos con más "likes".
     * 
     * @return array Lista de productos con más "likes".
     */
    public function mostrarConMasLikes()
    {
        $like = new like(null, null); // Crea una instancia de la clase Like
        return $like->masLikes(); // Devuelve los productos con más "likes"
    }
}
?>
