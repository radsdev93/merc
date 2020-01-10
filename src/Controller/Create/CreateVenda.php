<?php

namespace RAdSDev93\MercLegacy\Controller\Create;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Entity\Produto;
use RAdSDev93\MercLegacy\Entity\Tributo;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class CreateVenda implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    public function handle()
    {
        $produto = new Produto();
        $produtos = $produto->listarComEstoque();
        echo $html = $this->renderView('vendas/formulario.php', [
            'titulo' => 'Registrar nova venda',
            'produtos' => $produtos
        ]);
    }
}
