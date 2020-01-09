<?php

namespace RAdSDev93\MercLegacy\Controller\Delete;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class DeleteVenda implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        if(isset($_POST['vid'])) {
            $vid = filter_input(
                INPUT_POST,
                'vid',
                FILTER_VALIDATE_INT
            );
            $venda = new Venda($vid);
            if(!$venda) {
                $this->setFlashMessage('danger', 'Venda inexistente!');
                header('Location: /listar-vendas');
                exit;
            }
            $venda->excluir();
            $this->setFlashMessage('success', 'Venda removido com sucesso!');
            header('Location: /listar-vendas');
            exit;
        }
        $this->setFlashMessage('danger', 'Venda não pode ser nulo!');
        header('Location: /listar-vendas');
        exit;
    }
}
