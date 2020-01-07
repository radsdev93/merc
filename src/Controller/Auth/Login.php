<?php

namespace RAdSDev93\MercLegacy\Controller\Auth;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class Login implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if (is_null($email) || $email === false) {
            $this->setFlashMessage('danger', "E-mail inválido!");
            header('Location: /entrar');
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        $usuario = new Usuario();
        $usuario->validaLoginEmail($email);

        if (is_null($usuario) || !$usuario->validaSenha($senha)) {
            $this->setFlashMessage('danger', "E-mail ou senha inválidos!");
            header('Location: /entrar');
            return;
        }

        $_SESSION['logado'] = true;

        header('Location: /inicio');
    }
}
