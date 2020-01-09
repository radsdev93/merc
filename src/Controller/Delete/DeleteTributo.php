<?php

namespace RAdSDev93\MercLegacy\Controller\Delete;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Tributo;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class DeleteTributo implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        if(isset($_POST['tid'])) {
            $tid = filter_input(
                INPUT_POST,
                'tid',
                FILTER_VALIDATE_INT
            );
            $tributo = new Tributo($tid);
            if(!$tributo) {
                $this->setFlashMessage('danger', 'Tributo inexistente!');
                header('Location: /listar-tributos');
                exit;
            }
            $tributo->excluir();
            $this->setFlashMessage('success', 'Tributo removido com sucesso!');
            header('Location: /listar-tributos');
            exit;
        }
        $this->setFlashMessage('danger', 'Tributo não pode ser nulo!');
        header('Location: /listar-tributos');
        exit;
    }
}
