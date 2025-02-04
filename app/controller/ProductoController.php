<?php 

require_once __DIR__ . "/../../app/model/productos.php";   

/**
 * Clase ProductoController
 * 
 * 
 * Esta clase maneja las acciones relacionadas con los productos, como la creación, modificación,
 * eliminación y obtención de productos.
 * 
 * @package Controller
 */
class ProductoController
{
    /**
     * Crea un nuevo producto.
     * 
     * @param string $nombre El nombre del producto.
     * @param string $tipo El tipo del producto.
     * @param float $precio El precio del producto.
     * @param int $likes El número de likes del producto.
     * 
     * @return string Mensaje de éxito o error al crear el producto.
     */
    public function crearProducto($nombre, $tipo, $precio, $likes)
    {
        $producto = new Productos(null, $nombre, $tipo, $precio, $likes);
        return $producto->crearProducto();
    }

    /**
     * Modifica los datos de un producto.
     * 
     * @param int $idProducto El ID del producto a modificar.
     * @param string $nombre El nuevo nombre del producto.
     * @param string $tipo El nuevo tipo del producto.
     * @param float $precio El nuevo precio del producto.
     * 
     * @return string Mensaje de éxito o error al modificar el producto.
     */
    public function modificarProducto($idProducto, $nombre, $tipo, $precio)
    {
        $producto = new Productos($idProducto, $nombre, $tipo, $precio, null);
        return $producto->modificarProducto($idProducto, $nombre, $precio);
    }

    /**
     * Elimina un producto.
     * 
     * @param int $idProducto El ID del producto a eliminar.
     * 
     * @return string Mensaje de éxito o error al eliminar el producto.
     */
    public function eliminarProducto($idProducto)
    {
        $producto = new Productos($idProducto, null, null, null, null);
        return $producto->eliminarProducto($idProducto);
    }

    /**
     * Obtiene todos los productos.
     * 
     * @return array Lista de todos los productos.
     */
    public function obtenerProductos()
    {
        $producto = new Productos(null, null, null, null, null);
        return $producto->obtenerProductos();
    }

    /**
     * Obtiene los productos filtrados por tipo.
     * 
     * @param string $tipo El tipo de productos a buscar.
     * 
     * @return array Lista de productos del tipo especificado.
     */
    public function obtenerProductosPorTipo($tipo)
    {
        $producto = new Productos(null, null, $tipo, null, null);
        return $producto->obtenerProductosPorTipo($tipo);
    }

    /**
     * Obtiene un producto por su nombre.
     * 
     * @param string $nombre El nombre del producto a buscar.
     * 
     * @return array Lista de productos con el nombre especificado.
     */
    public function obtenerProductoNombre($nombre)
    {
        $producto = new Productos(null, $nombre, null, null, null);
        return $producto->obtenerProductoNombre();
    }

    /**
     * Obtiene un producto por su ID.
     * 
     * @param int $idProducto El ID del producto a buscar.
     * 
     * @return array Detalles del producto con el ID especificado.
     */
    public function obtenerProductoPorId($idProducto)
    {
        $producto = new Productos($idProducto, null, null, null, null);
        return $producto->obtenerProductoPorId($idProducto);
    }
}
?>
