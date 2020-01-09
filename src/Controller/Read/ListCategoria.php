<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class ListCategoria implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $listaDeCategorias;

    public function handle()
    {
        $categoria = new Categoria();
        $this->listaDeCategorias = $categoria->listar();
        echo $html = $this->renderView('categorias/listar-categorias.php', [
            'categorias' => $this->listaDeCategorias,
            'titulo' => 'Categorias',
        ]);
    }
}