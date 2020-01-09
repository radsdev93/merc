<?php

namespace RAdSDev93\MercLegacy\Controller\Delete;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class DeleteUsuario implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        if(isset($_POST['uid'])) {
            $uid = filter_input(
                INPUT_POST,
                'uid',
                FILTER_VALIDATE_INT
            );
            $usuario = new Usuario($uid);
            if(!$usuario) {
                $this->setFlashMessage('danger', 'Usuário inexistente!');
                header('Location: /listar-cursos');
                exit;
            }
            $usuario->excluir();
            if($usuario->isUid() === $_SESSION['uid']) {
                $this->setFlashMessage('success', 'Usuário removido com sucesso!');
                header('Location: /sair');
                exit;
            }
            $this->setFlashMessage('success', 'Usuário removido com sucesso!');
            header('Location: /listar-usuarios');
            exit;
        }
        $this->setFlashMessage('danger', 'Usuário não pode ser nulo!');
        header('Location: /listar-usuarios');
        exit;
    }
}
