<?php

require_once __DIR__ . '/../app/model/usuarios.php';


use PHPUnit\Framework\TestCase;



class usuariosTest extends TestCase{

    public function testGetUssuarios(){

        $usuarioMock = $this-> createMock(Usuario::class);

        $usuarioMock->method('getUsuarios') -> willReturn([
            ['id'=> 1,'nombre' =>'Juan','usuario' => 'juan123','contraseña' => '1234','esAdmin' => 1],
            ['id'=> 2,'nombre' =>'Pedro','usuario' => 'pedro123','contraseña' => '1234','esAdmin' => 0],
            ['id'=> 3,'nombre' =>'Maria','usuario' => 'maria123','contraseña' => '1234','esAdmin' => 0]
        ]);

        $usuario = new Usuario(null,null,null,null,null);
        $usuario = $usuario->getDatosUsaurio();

        $resultado = $usuarioMock->getDatosUsaurio("juan123");

        $this->assertEquals($usuario,$resultado);
    }


}




?>