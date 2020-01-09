<?php

namespace RAdSDev93\MercLegacy\Controller\Create;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class CreateUsuario implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    public function handle()
    {
        echo $html = $this->renderView('usuarios/registrar-usuario.php', [
            'titulo' => 'Registrar novo usuário'
        ]);
    }
}
