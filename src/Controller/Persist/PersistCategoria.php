<?php

namespace RAdSDev93\MercLegacy\Controller\Persist;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Categoria;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class PersistCategoria implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $categoria;

    public function handle()
    {
        if(isset($_POST['nome'])) {
            $nome = filter_input(
                INPUT_POST,
                'nome',
                FILTER_SANITIZE_STRING
            );

            if(isset($_POST['cid'])) {
                $cid = filter_input(
                    INPUT_POST,
                    'cid',
                    FILTER_VALIDATE_INT
                );
            }
            $tipo = 'success';
            if (isset($cid) && $cid !== false) {
                $this->categoria = new Categoria($cid);
                $this->categoria->setNome($nome);
                $this->categoria->atualizar();
                $this->setFlashMessage($tipo, 'Categoria atualizada com sucesso!');
            } else {
                $this->categoria = new Categoria();
                $this->categoria->setNome($nome);
                $this->categoria->inserir();
                $this->setFlashMessage($tipo, 'Categoria registrada com sucesso!');
            }
            header('Location: /listar-categorias');
            exit;
        }
        $this->setFlashMessage('danger', 'Categoria precisa de um nome!');
        header('Location: /listar-categorias');
        exit;
    }
}
