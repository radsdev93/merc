<?php

namespace RAdSDev93\MercLegacy\Controller\Persist;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;

class PersistVenda implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle()
    {
        if(!isset($_POST)) {
            $this->setFlashMessage("danger", "É necessário informar os produtos e suas quantidades para 
                                                           registrar uma venda!");
            header('Location: /listar-vendas');
            exit;
        }
        foreach($_POST['quantidade'] as $key=>$quantidade) {
            if($quantidade == 0) {
                $lista_remocao[] = $key;
            }
        }
        foreach($_POST['preco'] as $key=>$preco) {
            if(isset($lista_remocao)) {
                if (!in_array($key, $lista_remocao)) {
                    $produtos['preco'][] = filter_var($preco, FILTER_VALIDATE_FLOAT);
                }
            } else {
                $produtos['preco'][] = filter_var($preco, FILTER_VALIDATE_FLOAT);
            }
        }
        foreach($_POST['valor_tributo'] as $key=>$tributo) {
            if (isset($lista_remocao)) {
                if (!in_array($key, $lista_remocao)) {
                    $produtos['valor_tributo'][] = filter_var($tributo, FILTER_VALIDATE_FLOAT);
                }
            } else {
                $produtos['valor_tributo'][] = filter_var($tributo, FILTER_VALIDATE_FLOAT);
            }
        }
        foreach($_POST['categoria_nome'] as $key=>$categoria) {
            if(isset($lista_remocao)) {
                if (!in_array($key, $lista_remocao)) {
                    $produtos['categoria_nome'][] = filter_var($categoria, FILTER_SANITIZE_STRING);
                }
            } else {
                $produtos['categoria_nome'][] = filter_var($categoria, FILTER_SANITIZE_STRING);
            }
        }
        foreach($_POST['pid'] as $key=>$produto_id) {
            if(isset($lista_remocao)) {
                if (!in_array($key, $lista_remocao)) {
                    $produtos['pid'][] = filter_var($produto_id, FILTER_VALIDATE_INT);
                }
            } else {
                $produtos['pid'][] = filter_var($produto_id, FILTER_VALIDATE_INT);
            }
        }
        foreach($_POST['quantidade'] as $key=>$quantidade) {
            if(isset($lista_remocao)) {
                if (!in_array($key, $lista_remocao)) {
                    $produtos['quantidade'][] = filter_var($quantidade, FILTER_VALIDATE_INT);
                }
            } else {
                $produtos['quantidade'][] = filter_var($quantidade, FILTER_VALIDATE_INT);
            }
        }
        foreach($produtos as $indice=>$item) {
            foreach($item as $chave=>$dado) {
                $p[$chave][$indice] = $dado;
            }
        }
        $total_produtos = 0;
        $total_tributos = 0;
        $total = 0;
        for($i = 0; $i < count($p); $i++) {
            $p[$i]['total_produto'] = $p[$i]['preco'] * $p[$i]['quantidade'];
            $p[$i]['total_tributo'] = $p[$i]['total_produto'] * ($p[$i]['valor_tributo']/100);
            $p[$i]['subtotal'] = $p[$i]['total_produto'] + $p[$i]['total_tributo'];
            $total_produtos += $p[$i]['total_produto'];
            $total_tributos += $p[$i]['total_tributo'];
            $total += $p[$i]['subtotal'];
        }
        $venda = new Venda();
        $venda->setUsuarioId($_SESSION['uid']);
        $venda->setValorProdutos($total_produtos);
        $venda->setValorTributos($total_tributos);
        $venda->setValorTotal($total);
        $venda->setDataRegistro(date('Y-m-d h:i:s'));
        if($venda->inserir($p)) {
            $this->setFlashMessage('success', 'Venda registrada com sucesso!');
        } else {
            $this->setFlashMessage('danger', 'Erro ao cadastrar venda! Tente novamente!');
        }
        header('Location: /listar-vendas');
        exit;
    }
}
