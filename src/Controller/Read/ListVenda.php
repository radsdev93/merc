<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class ListVenda implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $listaDeVendas;

    public function handle()
    {
        $vendas = new Venda();
        $this->listaDeVendas = $vendas->listar();
        echo $html = $this->renderView('vendas/listar-vendas.php', [
            'vendas' => $this->listaDeVendas,
            'titulo' => 'Vendas',
        ]);
    }
}