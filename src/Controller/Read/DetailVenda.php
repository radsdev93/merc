<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Entity\Tributo;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class DetailVenda implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    public function handle()
    {
        if(!isset($_POST['vid'])) {
            $this->setFlashMessage("danger", "Registro de venda não encontrado!");
            header('Location: /listar-vendas');
            exit;
        }
        $vid = filter_input(
            INPUT_POST,
            'vid',
            FILTER_VALIDATE_INT
        );
        $venda = new Venda($vid);
        $produtos = $venda->getProdutos();

        foreach($produtos as $key=>$produto) {
            $categoria = new Categoria($produto['categoria_id']);
            $produtos[$key]['categoria_nome'] = $categoria->getNome();
            $produtos[$key]['tributo'] = Tributo::listarPorCategoria($produto['categoria_id']);
            $produtos[$key]['subtotal_produto'] = $produtos[$key]['preco'] * $produtos[$key]['quantidade'];
            $produtos[$key]['subtotal_tributo'] = $produtos[$key]['subtotal_produto'] * ($produtos[$key]['tributo']['valor_percentual']/100);
            $produtos[$key]['subtotal'] = $produtos[$key]['subtotal_produto'] + $produtos[$key]['subtotal_tributo'];
        }

        echo $html = $this->renderView('vendas/detalhes-venda.php', [
            'titulo' => 'Detalhes da Venda ID: ' . $vid,
            'produtos' => $produtos
        ]);
    }
}