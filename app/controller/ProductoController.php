<?php 


require_once "../../app/model/productos.php";   

class ProductoController
{
    public function crearProducto($nombre,$tipo, $precio,$likes)
    {
        $producto = new Productos(null, $nombre,$tipo, $precio,$likes);
        return $producto->crearProducto();
    }

    public function modificarProducto($idProducto, $nombre,$tipo, $precio)
    {
        $producto = new Productos($idProducto, $nombre , $tipo, $precio ,null);
        return $producto->modificarProducto($idProducto, $nombre, $precio);
    }

    public function eliminarProducto($idProducto)
    {
        $producto = new Productos($idProducto, null, null,null,null);
        return $producto->eliminarProducto($idProducto);
    }

    public function obtenerProductos()
    {
        $producto = new Productos(null, null, null,null,null);
        return $producto->obtenerProductos();
    }

    public function obtenerProductosPorTipo($tipo) {
        $producto = new Productos(null, null, $tipo,null,null);
        return $producto->obtenerProductosPorTipo($tipo);
    }

}




?>