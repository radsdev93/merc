<?php

namespace RAdSDev93\MercLegacy\Controller\Persist;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class PersistVenda implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $venda;

    public function handle()
    {
        $usuario_id = $_SESSION['uid'];

        foreach($_POST['preco'] as $preco) {
            $produtos['preco'][] = filter_var($preco,FILTER_VALIDATE_FLOAT);
        }

        foreach($_POST['valor_tributo'] as $tributo) {
            $produtos['valor_tributo'][] = filter_var($tributo,FILTER_VALIDATE_FLOAT);
        }

        foreach($_POST['categoria_nome'] as $categoria) {
            $produtos['categoria_nome'][] = filter_var($categoria, FILTER_SANITIZE_STRING);
        }

        foreach($_POST['pid'] as $produto_id) {
            $produtos['pid'][] = filter_var($produto_id, FILTER_VALIDATE_INT);
        }

        foreach($_POST['quantidade'] as $quantidade) {
           $produtos['quantidade'][] = filter_var($quantidade, FILTER_VALIDATE_INT);
        }

        foreach($produtos['preco'] as $preco) {
            foreach($produtos['quantidade'] as $quantidade)
            echo '<pre>';
            var_dump($preco * $quantidade);

        }
        exit;
        $this->venda = new Venda();
        $this->venda->setUsuarioId($usuario_id);
        $this->venda->setValorProdutos($valor_produtos);

        if($this->venda->inserir($params)) {
            $this->setFlashMessage('success', 'Produto registrado com sucesso!');
        }
        $this->setFlashMessage('danger', 'Erro ao cadastrar produto! Tente novamente!');
        header('Location: /listar-vendas');
        exit;
    }
}
