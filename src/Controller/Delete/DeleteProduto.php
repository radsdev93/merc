<?php

namespace RAdSDev93\MercLegacy\Controller\Delete;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Produto;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class DeleteProduto implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        if(isset($_POST['pid'])) {
            $pid = filter_input(
                INPUT_POST,
                'pid',
                FILTER_VALIDATE_INT
            );
            $produto = new Produto($pid);
            if(!$produto) {
                $this->setFlashMessage('danger', 'Produto inexistente!');
                header('Location: /listar-produtos');
                exit;
            }
            $produto->excluir();
            $this->setFlashMessage('success', 'Produto removido com sucesso!');
            header('Location: /listar-produtos');
            exit;
        }
        $this->setFlashMessage('danger', 'Produto não pode ser nulo!');
        header('Location: /listar-produtos');
        exit;
    }
}
