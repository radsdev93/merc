<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Tributo;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class ListTributo implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $listaDeTributos;

    public function handle()
    {
        $tributo = new Tributo();
        $this->listaDeTributos = $tributo->listar();
        echo $html = $this->renderView('tributos/listar-tributos.php', [
            'tributos' => $this->listaDeTributos,
            'titulo' => 'Tributos',
        ]);
    }
}