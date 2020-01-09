<?php

namespace RAdSDev93\MercLegacy\Controller\Persist;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class PersistUsuario implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $usuario;

    public function handle()
    {
        if(isset($_POST['uid'])) {
            $uid = filter_input(
                INPUT_POST,
                'uid',
                FILTER_VALIDATE_INT
            );
        }

        $nome = filter_input(
            INPUT_POST,
            'nome',
            FILTER_SANITIZE_STRING
        );

        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if(isset($_POST['nivel'])  && !empty($_POST['nivel'])) {
            $nivel = filter_input(
                INPUT_POST,
                'nivel',
                FILTER_SANITIZE_STRING
            );
        }

        if(isset($_POST['senha']) && !empty($_POST['senha'])) {
            $senha = filter_input(
                INPUT_POST,
                'senha',
                FILTER_SANITIZE_STRING
            );
            $senha = password_hash($senha, PASSWORD_DEFAULT);
        }

        $tipo = 'success';

        if (!is_null($uid) && $uid !== false) {
            $this->usuario = new Usuario($uid);
            $this->usuario->setNome($nome);
            $this->usuario->setEmail($email);
            if(isset($senha) && !empty($senha)) {
                $this->usuario->setSenha($senha);
            }
            $this->usuario->atualizar();
            $this->setFlashMessage($tipo, 'Usuário atualizado com sucesso!');
        } else {
            $this->usuario = new Usuario();
            $this->usuario->setNome($nome);
            $this->usuario->setEmail($email);
            $this->usuario->setSenha($senha);
            $this->usuario->setNivel($nivel);
            $this->usuario->setDataCadastro(date('Y-m-d h:i:s'));
            $this->usuario->inserir();
            $this->setFlashMessage($tipo, 'Usuário registrado com sucesso!');
        }

        if($_POST['self']) {
            header('Location: /inicio');
            exit;
        }

        header('Location: /listar-usuarios');
        exit;
    }
}
