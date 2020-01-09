<?php

namespace RAdSDev93\MercLegacy\Controller\Delete;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class DeleteCategoria implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        if(isset($_POST['cid'])) {
            $cid = filter_input(
                INPUT_POST,
                'cid',
                FILTER_VALIDATE_INT
            );
            $categoria = new Categoria($cid);
            if(!$categoria) {
                $this->defineMensagem('danger', 'Categoria inexistente!');
                header('Location: /listar-categorias');
                exit;
            }
            $categoria->excluir();
            $this->setFlashMessage('success', 'Categoria removida com sucesso!');
            header('Location: /listar-categorias');
            exit;
        }
        $this->setFlashMessage('danger', 'Categoria não pode ser nula!');
        header('Location: /listar-categorias');
        exit;
    }
}
