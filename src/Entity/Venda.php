<?php

namespace RAdSDev93\MercLegacy\Entity;

use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Infra\Connection;

class Venda implements VendaInterfaceInterface
{
    use FlashMessageTrait;

    private $vid;
    private $valor_produtos;
    private $valor_tributos;
    private $valor_total;
    private $data_registro;
    private $usuario_id;
    private $produtos;

    public function __construct($id = false)
    {
        if ($id) {
            $this->vid = $id;
            $this->carregar();
            $this->carregarProdutos();
        }
    }

    public static function listar()
    {
        $query = "SELECT v.vid, v.valor_produtos, v.valor_tributos, v.valor_total, v.data_registro, 
                  u.nome as usuario_nome
                  FROM vendas v
                  INNER JOIN usuarios u ON v.usuario_id = u.uid
                  ORDER BY v.data_registro";
        $connection = Connection::connect();
        $result = $connection->query($query);
        return $result->fetchAll();
    }

    public function carregar()
    {
        $query = "SELECT valor_produtos, valor_tributos, valor_total, data_registro, usuario_id FROM vendas WHERE vid = :vid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':vid', $this->vid);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->valor_produtos = $row['valor_produtos'];
        $this->valor_tributos = $row['valor_tributos'];
        $this->valor_total = $row['valor_total'];
        $this->data_registro = $row['data_registro'];
        $this->usuario_id = $row['usuario_id'];
    }

    public function inserir($params = false)
    {
        if($params === false) {
            $this->setFlashMessage("danger", "É necessário informar os produtos e suas quantidades para 
                                                           registrar uma venda!");
            header('Location: /listar-vendas');
            return;
        }
        $produtos = $params["produtos"];
        foreach($produtos as $produto) {
            $p = new Produto($produto["pid"]);
            $this->valor_produtos += $p->getPreco() * $produto["quantidade"];
            $c = new Categoria($p->getCategoriaId());
            $tributos = $c->getTributos();
            foreach($tributos as $tributo) {
                $this->valor_tributos += ($p->getPreco() * ($tributo["valor_percentual"] / 100)
                                          * $produto["quantidade"]);
            }
            $this->valor_total += $this->valor_produtos + $this->valor_tributos;
        }
        $this->data_registro = date("Y-m-d H:i:s");
        $query = "INSERT INTO vendas (valor_produtos, valor_tributos, valor_total, data_registro, usuario_id)
                  VALUES (:valor_produtos, :valor_tributos, :valor_total, :data_registro, :usuario_id)";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':valor_produtos', $this->valor_produtos);
        $stmt->bindValue(':valor_tributos', $this->valor_tributos);
        $stmt->bindValue(':valor_total', $this->valor_total);
        $stmt->bindValue(':data_registro', $this->data_registro);
        $stmt->bindValue(':usuario_id', $this->usuario_id);
        $stmt->execute();
        $query = "INSERT INTO venda_produto (venda_id, produto_id, quantidade)
                  VALUES (:venda_id, :produto_id, :quantidade)";
        foreach($produtos as $produto) {
            $stmt = $connection->prepare($query);
            $stmt->bindValue(':venda_id', $this->vid);
            $stmt->bindValue(':produto_id', $produto["pid"]);
            $stmt->bindValue(':quantidade', $produto["quantidade"]);
            $stmt->execute();
        }
    }

    public function excluir()
    {
        $query = "DELETE FROM vendas WHERE vid = :vid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue('vid', $this->vid);
        $stmt->execute();
    }

    public static function listarPorUsuario($usuario_id)
    {
        $query = "SELECT vid, valor_produtos, valor_tributos, valor_total, data_registro FROM vendas WHERE usuario_id = :usuario_id";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':usuario_id', usuario_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function listarPorProduto($produto_id)
    {
        $query = "SELECT v.vid, v.valor_produtos, v.valor_tributos, v.valor_total, v.data_registro, v.usuario_id, 
                  vp.quantidade as quantidade
                  FROM vendas v
                  INNER JOIN venda_produto vp ON v.vid = vp.venda_id
                  WHERE vp.produto_id = :produto_id
                  ORDER BY v.data_registro";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':produto_id', $produto_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorVenda($this->vid);
    }
}
