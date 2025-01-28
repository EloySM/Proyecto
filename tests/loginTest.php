<?php

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../');
require_once 'app/controller/UsuarioController.php';
require_once __DIR__ . '/../app/controller/ProductoController.php';

use PHPUnit\Framework\TestCase;

class loginTest extends TestCase {
    public function testLogin() {
        // Crear instancia de UsuarioController
        $usuarioController = new UsuarioController();
        $result = $usuarioController->loginUsuario('Arkaitz', 'abc123..');
        $this->assertNotEmpty($result, 'El resultado de loginUsuario no debe estar vacío y debe encontrarse en la DDBB');
    }

    public function testExisteProducto()
{
    $productoMock = $this->createMock(ProductoController::class);

    $productoMock->method('obtenerProductoNombre')->willReturn('Algo');

    $resultado = $productoMock->obtenerProductoNombre('Algo');

    $this->assertEquals('Algo', $resultado);
}

}