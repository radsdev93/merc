<?php

namespace RAdSDev93\MercLegacy\Controller\Persist;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class PersistVenda implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $produto;

    public function handle()
    {
        $usuario_id = filter_input(
            INPUT_POST,
            'usuario_id',
            FILTER_VALIDATE_INT
            );


        $nome = filter_input(
            INPUT_POST,
            'nome',
            FILTER_SANITIZE_STRING
        );

        $preco = filter_input(
            INPUT_POST,
            'preco',
            FILTER_VALIDATE_FLOAT
        );

        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        $estoque = filter_input(
            INPUT_POST,
            'estoque',
            FILTER_VALIDATE_INT
        );

        $categoria_id = filter_input(
            INPUT_POST,
            'categoria_id',
            FILTER_VALIDATE_INT
        );

        $tipo = 'success';

        if (!is_null($pid) && $pid !== false) {
            $this->venda = new Venda($pid);
            $this->produto->setNome($nome);
            $this->produto->setPreco($preco);
            $this->produto->setDescricao($descricao);
            $this->produto->setEstoque($estoque);
            $this->produto->setCategoriaId($categoria_id);
            $this->venda->setDataRegistro(date('Y-m-d h:i:s'));
            $this->produto->atualizar();
            $this->setFlashMessage($tipo, 'Produto atualizado com sucesso!');
        } else {
            $this->produto = new Produto();
            $this->produto->setNome($nome);
            $this->produto->setPreco($preco);
            $this->produto->setDescricao($descricao);
            $this->produto->setEstoque($estoque);
            $this->produto->setCategoriaId($categoria_id);
            $this->produto->inserir();
            $this->setFlashMessage($tipo, 'Produto registrado com sucesso!');
        }
        header('Location: /listar-vendas');
        exit;
    }
}
