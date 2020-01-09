<?php

namespace RAdSDev93\MercLegacy\Controller;

use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class Home implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $usuario;

    public function handle()
    {
        $this->usuario = new Usuario($_SESSION['uid']);

        echo $html = $this->renderView('home.php', [
            'titulo' => 'Bem-vindo ao Merc!',
            'usuario' => $this->usuario
        ]);
    }
}
