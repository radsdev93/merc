<?php

namespace RAdSDev93\MercLegacy\Controller\Update;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Tributo;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class UpdateTributo implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    private $tributo;

    public function handle()
    {
        $tid = filter_input(
            INPUT_POST,
            'tid',
            FILTER_VALIDATE_INT
        );

        if (is_null($tid) || $tid === false) {
            $this->setFlashMessage('danger', 'ID de tributo inválido!');
            header('Location: /inicio');
            exit;
        }

        $this->tributo = new Tributo($tid);

        echo $html = $this->renderView('tributos/formulario.php', [
            'titulo' => 'Atualizar tributo: ' . $this->tributo->getNome(),
            'tributo' => $this->tributo
        ]);
    }
}
