<?php

require_once '../../app/model/deseados.php';
require_once '../../app/model/productos.php';

/**
 * 
 * Clase DeseadoController
 * 
 * Esta clase maneja las operaciones relacionadas con los productos en la lista de deseos de los usuarios,
 * incluyendo la adición, eliminación y obtención de productos de la lista de deseos.
 * @package Controller
 */
class DeseadoController
{
    /**
     * Añade un producto a la lista de deseos de un usuario.
     * 
     * Recupera el ID del usuario y el ID del producto desde la sesión y el POST, respectivamente,
     * y llama al método `addDeseado` de la clase `deseado` para agregar el producto a la lista de deseos.
     */
    public function añadirDeseado()
    {
        $ID_Usuario = $_SESSION['id'];         // Recupera el ID del usuario de la sesión
        $ID_Producto = $_POST['product_id'];   // Recupera el ID del producto desde el POST
        $deseado = new deseado($ID_Usuario, $ID_Producto); // Crea una instancia de la clase deseado
        $deseado->addDeseado($ID_Usuario, $ID_Producto);  // Llama al método para añadir el producto a la lista de deseos
    }

    /**
     * Obtiene la lista de productos deseados de un usuario.
     * 
     * Recupera el ID del usuario desde la sesión y llama al método `getDeseados` de la clase `deseado`
     * para obtener la lista de productos que el usuario ha añadido a su lista de deseos.
     * 
     * @return array Lista de productos deseados del usuario.
     */
    public function getDeseados()
    {
        $ID_Usuario = $_SESSION['id']; // Recupera el ID del usuario de la sesión
        $deseado = new deseado($ID_Usuario, null); // Crea una instancia de la clase deseado
        $deseados = $deseado->getDeseados($ID_Usuario); // Llama al método para obtener la lista de productos deseados
        return $deseados; // Retorna la lista de productos deseados
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

    /**
     * Elimina un producto de la lista de deseos de un usuario.
     * 
     * Recupera el ID del usuario y el ID del producto desde la sesión y el POST, respectivamente,
     * y llama al método `deleteDeseado` de la clase `deseado` para eliminar el producto de la lista de deseos.
     */
    public function eliminarDeseado()
    {
        $ID_Usuario = $_SESSION['id'];          // Recupera el ID del usuario de la sesión
        $ID_Producto = $_POST['ID_Producto'];   // Recupera el ID del producto desde el POST
        $deseado = new deseado($ID_Usuario, $ID_Producto); // Crea una instancia de la clase deseado
        $deseado->deleteDeseado($ID_Usuario, $ID_Producto); // Llama al método para eliminar el producto de la lista de deseos
    }
}
