<?php

namespace RAdSDev93\MercLegacy\Controller\Create;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class CreateVenda implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    public function handle()
    {
        echo $html = $this->renderView('vendas/formulario.php', [
            'titulo' => 'Registrar nova venda'
        ]);
    }
}
