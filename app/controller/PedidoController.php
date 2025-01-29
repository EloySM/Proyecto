<?php

require_once '../../app/model/pedidos.php';
require_once '../../app/model/productos.php';

class PedidoController
{

    public function añadirProductoCarrito($ID_Usuario, $ID_Producto)
    {
        $ID_Usuario = $_SESSION['id'];
        $ID_Pedido = $_POST['product_id'];
        $pedido = new pedidos($ID_Usuario, $ID_Producto);
        $pedido->añadirProductoCarrito($ID_Usuario, $ID_Producto);
    }

    public function getPedidos()
    {
        $ID_Usuario = $_SESSION['id'];
        $pedido = new pedidos($ID_Usuario, null);
        $carrito = $pedido->getCarrito($ID_Usuario);
        return $carrito;
    }

    public function eliminarPedido($ID_Producto)
    {
        $ID_Usuario = $_SESSION['id'];
        $pedido = new pedidos($ID_Usuario, $ID_Producto);
        $pedido->eliminarProductoCarrito($ID_Usuario, $ID_Producto);
    }

    public function getProductoById($ID_Producto)
    {
        $producto = new Productos($ID_Producto, null, null, null, null);
        return $producto->obtenerProductoPorId($ID_Producto);
    }

    public function comprobarCarrito()
    {
        $ID_Usuario = $_SESSION['id'];
        $pedido = new pedidos($ID_Usuario, null);
        $carrito = $pedido->getCarrito($ID_Usuario);
        return $carrito;
    }
}
