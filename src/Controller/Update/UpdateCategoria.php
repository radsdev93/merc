<?php

namespace RAdSDev93\MercLegacy\Controller\Update;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class UpdateCategoria implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    private $categoria;

    public function handle()
    {
        $cid = filter_input(
            INPUT_POST,
            'cid',
            FILTER_VALIDATE_INT
        );

        if (is_null($cid) || $cid === false) {
            $this->setFlashMessage('danger', 'ID de categoria inválido!');
            header('Location: /inicio');
            exit;
        }

        $this->categoria = new Categoria($cid);

        echo $html = $this->renderView('categorias/formulario.php', [
            'titulo' => 'Atualizar categoria: ' . $this->categoria->getNome(),
            'categoria' => $this->categoria
        ]);
    }
}
