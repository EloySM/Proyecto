<?php

require_once '../../app/model/pedidos.php';
require_once '../../app/model/productos.php';

/**
 * Clase PedidoController
 * 
 * 
 * Esta clase maneja las operaciones relacionadas con los pedidos y el carrito de compras de un usuario.
 * @package Controller
 */
class PedidoController
{
    /**
     * Añade un producto al carrito de un usuario.
     * 
     * @param int $ID_Usuario El ID del usuario que añade el producto al carrito.
     * @param int $ID_Producto El ID del producto a añadir al carrito.
     * 
     * @return void
     */
    public function añadirProductoCarrito($ID_Usuario, $ID_Producto)
    {
        $ID_Usuario = $_SESSION['id']; // Obtiene el ID del usuario desde la sesión
        $ID_Pedido = $_POST['product_id']; // Obtiene el ID del producto desde la solicitud
        $pedido = new pedidos($ID_Usuario, $ID_Producto);
        $pedido->añadirProductoCarrito($ID_Usuario, $ID_Producto);
    }

    /**
     * Obtiene los productos en el carrito de un usuario.
     * 
     * @return array Lista de productos en el carrito del usuario.
     */
    public function getPedidos()
    {
        $ID_Usuario = $_SESSION['id']; // Obtiene el ID del usuario desde la sesión
        $pedido = new pedidos($ID_Usuario, null);
        $carrito = $pedido->getCarrito($ID_Usuario);
        return $carrito;
    }

    /**
     * Elimina un producto del carrito de un usuario.
     * 
     * @param int $ID_Producto El ID del producto a eliminar del carrito.
     * 
     * @return void
     */
    public function eliminarPedido($ID_Producto)
    {
        $ID_Usuario = $_SESSION['id']; // Obtiene el ID del usuario desde la sesión
        $pedido = new pedidos($ID_Usuario, $ID_Producto);
        $pedido->eliminarProductoCarrito($ID_Usuario, $ID_Producto);
    }

    /**
     * Obtiene un producto por su ID.
     * 
     * @param int $ID_Producto El ID del producto.
     * 
     * @return array Detalles del producto.
     */
    public function getProductoById($ID_Producto)
    {
        $producto = new Productos($ID_Producto, null, null, null, null);
        return $producto->obtenerProductoPorId($ID_Producto);
    }

    /**
     * Verifica si el carrito del usuario tiene productos.
     * 
     * @return array El carrito del usuario.
     */
    public function comprobarCarrito()
    {
        $ID_Usuario = $_SESSION['id']; // Obtiene el ID del usuario desde la sesión
        $pedido = new pedidos($ID_Usuario, null);
        $carrito = $pedido->getCarrito($ID_Usuario);
        return $carrito;
    }
}
?>
