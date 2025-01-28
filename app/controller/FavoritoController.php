<?php

require_once '../../app/model/favorito.php';
require_once '../../app/model/productos.php';



class FavoritoController
{

    public function añadirFavorito()
    {
        $ID_Usuario = $_SESSION['id'];
        $ID_Producto = $_POST['product_id'];
        $favorito = new favorito($ID_Usuario, $ID_Producto);
        $favorito->addFavorito($ID_Usuario, $ID_Producto);
    }

    public function eliminarFavorito() {
        $ID_Usuario = $_SESSION['id'];
        $ID_Producto = $_POST['ID_Producto'];
        $favorito = new favorito($ID_Usuario, $ID_Producto);
        $favorito->deleteFavorito($ID_Usuario, $ID_Producto);
    }

    public function getFavoritos() {
        $ID_Usuario = $_SESSION['id'];
        $favorito = new favorito( $ID_Usuario, null);
        $favoritos = $favorito->getFavoritos($ID_Usuario);
        return $favoritos;
    }

    public function getProductoById($ID_Producto)
    {
        $producto = new Productos($ID_Producto, null, null, null, null);
        return $producto->obtenerProductoPorId($ID_Producto);
    }
}
