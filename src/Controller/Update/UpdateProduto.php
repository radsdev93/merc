<?php

namespace RAdSDev93\MercLegacy\Controller\Update;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Entity\Produto;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class UpdateProduto implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    private $produto;
    private $categorias;

    public function handle()
    {
        $pid = filter_input(
            INPUT_POST,
            'pid',
            FILTER_VALIDATE_INT
        );

        if (is_null($pid) || $pid === false) {
            $this->setFlashMessage('danger', 'ID de produto inválido!');
            header('Location: /inicio');
            exit;
        }

        $this->produto = new Produto($pid);
        $categoria = new Categoria();
        $this->categorias = $categoria->listar();

        echo $html = $this->renderView('produtos/formulario.php', [
            'titulo' => 'Atualizar produto: ' . $this->produto->getNome(),
            'produto' => $this->produto,
            'categorias' => $this->categorias
        ]);
    }
}
