<?php

namespace RAdSDev93\MercLegacy\Controller\Update;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class UpdateVenda implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    private $venda;

    public function handle()
    {
        $vid = filter_input(
            INPUT_POST,
            'vid',
            FILTER_VALIDATE_INT
        );

        if (is_null($vid) || $vid === false) {
            $this->setFlashMessage('danger', 'ID de venda inválido!');
            header('Location: /inicio');
            exit;
        }

        $this->venda = new Venda($vid);

        echo $html = $this->renderView('vendas/formulario.php', [
            'titulo' => 'Atualizar venda: ' . $this->venda->getVid(),
            'venda' => $this->venda
        ]);
    }
}
