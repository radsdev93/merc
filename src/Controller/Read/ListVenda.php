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

        if(isset($_POST['vid'])) {
            $vid = filter_input(
                INPUT_POST,
                'vid',
                FILTER_VALIDATE_INT
            );
        }
        $vendas = new Venda($vid);
        $this->listaDeVendas = $vendas->listar();
        echo $html = $this->renderView('produtos/listar-vendas.php', [
            'vendas' => $this->listaDeVendas,
            'titulo' => 'Vendas',
        ]);
    }
}