<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class ListUsuario implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $listaDeUsuarios;

    public function handle()
    {
        $usuario = new Usuario();
        $this->listaDeUsuarios = $usuario->listar();
        echo $html = $this->renderView('usuarios/listar-usuarios.php', [
            'usuarios' => $this->listaDeUsuarios,
            'titulo' => 'Usuários',
        ]);
    }
}