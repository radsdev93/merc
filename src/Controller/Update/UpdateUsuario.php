<?php

namespace RAdSDev93\MercLegacy\Controller\Update;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class UpdateUsuario implements RequestHandlerInterface
{
    use RenderViewTrait, FlashMessageTrait;

    private $usuario;

    public function handle()
    {
        $uid = filter_input(
            INPUT_POST,
            'uid',
            FILTER_VALIDATE_INT
        );

        if (is_null($uid) || $uid === false) {
            $this->setFlashMessage('danger', 'ID de usuário inválido!');
            header('Location: /inicio');
            exit;
        }

        $this->usuario = new Usuario($uid);

        echo $html = $this->renderView('usuarios/atualizar-usuario.php', [
            'titulo' => 'Atualizar usuário: ' . $this->usuario->getNome(),
            'usuario' => $this->usuario
        ]);
    }
}
