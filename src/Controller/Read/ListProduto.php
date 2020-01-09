<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Produto;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class ListProduto implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $listaDeProdutos;

    public function handle()
    {
        $produto = new Produto();
        $this->listaDeProdutos = $produto->listar();
        echo $html = $this->renderView('produtos/listar-produtos.php', [
            'produtos' => $this->listaDeProdutos,
            'titulo' => 'Produtos',
        ]);
    }
}