<?php

require_once '../../app/model/deseados.php';
require_once '../../app/model/productos.php'; 

class DeseadoController
{

    public function añadirDeseado()
    {
        $ID_Usuario = $_SESSION['id'];
        $ID_Producto = $_POST['product_id']; 
        if (!$this->esDeseado($ID_Usuario, $ID_Producto)) {
            $deseado = new deseado(null, $ID_Usuario, $ID_Producto);
            $deseado->addDeseado($ID_Usuario, $ID_Producto);
        }
    }

    public function getDeseados()
    {
        $ID_Usuario = $_SESSION['id'];
        $deseado = new deseado(null, $ID_Usuario, null);
        $deseados = $deseado->getDeseados($ID_Usuario);
        return $deseados;
    }

    public function getProductoById($ID_Producto)
    {
        $producto = new Productos($ID_Producto, null, null, null, null);
        return $producto->obtenerProductoPorId($ID_Producto);
    }

    public function eliminarDeseado()
    {
        $ID_Usuario = $_SESSION['id'];
        $ID_Producto = $_POST['ID_Producto'];
        $deseado = new deseado(null, $ID_Usuario, $ID_Producto);
        $deseado->deleteDeseado($ID_Usuario, $ID_Producto);
    }

    public function esDeseado($ID_Usuario, $ID_Producto)
    {
        $deseado = new deseado(null, $ID_Usuario, $ID_Producto);
        return $deseado->verificarDeseado($ID_Usuario, $ID_Producto);
    }
}

?>