<?php

namespace RAdSDev93\MercLegacy\Controller\Create;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class CreateProduto implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    public function handle()
    {
        echo $html = $this->renderView('produtos/formulario.php', [
            'titulo' => 'Registrar novo produto'
        ]);
    }
}
