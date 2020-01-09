<?php

namespace RAdSDev93\MercLegacy\Controller\Create;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class CreateProduto implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    private $categorias;

    public function handle()
    {
        $categoria = new Categoria();
        $this->categorias = $categoria->listar();

        echo $html = $this->renderView('produtos/formulario.php', [
            'titulo' => 'Registrar novo produto',
            'categorias' => $this->categorias
        ]);
    }
}
