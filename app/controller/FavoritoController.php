<?php

require_once '../../app/model/favorito.php';
require_once '../../app/model/productos.php';

/**
 * Clase FavoritoController
 * 
 * 
 * Esta clase maneja las operaciones relacionadas con los productos favoritos de los usuarios,
 * incluyendo la adición, eliminación y obtención de productos de la lista de favoritos.
 * @package Controller
 */
class FavoritoController
{
    /**
     * Añade un producto a la lista de favoritos de un usuario.
     * 
     * Recupera el ID del usuario y el ID del producto desde la sesión y el POST, respectivamente,
     * y llama al método `addFavorito` de la clase `favorito` para agregar el producto a la lista de favoritos.
     */
    public function añadirFavorito()
    {
        $ID_Usuario = $_SESSION['id'];         // Recupera el ID del usuario de la sesión
        $ID_Producto = $_POST['product_id'];   // Recupera el ID del producto desde el POST
        $favorito = new favorito($ID_Usuario, $ID_Producto); // Crea una instancia de la clase favorito
        $favorito->addFavorito($ID_Usuario, $ID_Producto);  // Llama al método para añadir el producto a favoritos
    }

    /**
     * Elimina un producto de la lista de favoritos de un usuario.
     * 
     * Recupera el ID del usuario y el ID del producto desde la sesión y el POST, respectivamente,
     * y llama al método `deleteFavorito` de la clase `favorito` para eliminar el producto de la lista de favoritos.
     */
    public function eliminarFavorito() 
    {
        $ID_Usuario = $_SESSION['id'];          // Recupera el ID del usuario de la sesión
        $ID_Producto = $_POST['ID_Producto'];   // Recupera el ID del producto desde el POST
        $favorito = new favorito($ID_Usuario, $ID_Producto); // Crea una instancia de la clase favorito
        $favorito->deleteFavorito($ID_Usuario, $ID_Producto); // Llama al método para eliminar el producto de favoritos
    }

    /**
     * Obtiene la lista de productos favoritos de un usuario.
     * 
     * Recupera el ID del usuario desde la sesión y llama al método `getFavoritos` de la clase `favorito`
     * para obtener la lista de productos que el usuario tiene en sus favoritos.
     * 
     * @return array Lista de productos favoritos del usuario.
     */
    public function getFavoritos() 
    {
        $ID_Usuario = $_SESSION['id']; // Recupera el ID del usuario de la sesión
        $favorito = new favorito($ID_Usuario, null); // Crea una instancia de la clase favorito
        $favoritos = $favorito->getFavoritos($ID_Usuario); // Llama al método para obtener la lista de favoritos
        return $favoritos; // Retorna la lista de productos favoritos
    }

    /**
     * Obtiene un producto por su ID.
     * 
     * Utiliza el ID del producto para obtener sus detalles llamando al método `obtenerProductoPorId` 
     * de la clase `Productos`.
     * 
     * @param int $ID_Producto ID del producto a obtener.
     * @return array Detalles del producto.
     */
    public function getProductoById($ID_Producto)
    {
        $producto = new Productos($ID_Producto, null, null, null, null); // Crea una instancia de la clase Producto
        return $producto->obtenerProductoPorId($ID_Producto); // Llama al método para obtener los detalles del producto
    }
}
