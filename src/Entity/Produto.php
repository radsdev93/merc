<?php

namespace RAdSDev93\MercLegacy\Entity;

use RAdSDev93\MercLegacy\Infra\Connection;

class Produto implements EntityHasCategoriaInterface
{
    private $pid;
    private $nome;
    private $preco;
    private $descricao;
    private $estoque;
    private $categoria_id;
    private $vendas;

    public function __construct($id = false)
    {
        if ($id) {
            $this->pid = $id;
            $this->carregar();
            $this->carregarVendas();
        }
    }

    public static function listar()
    {
        $query = "SELECT p.pid, p.nome, p.preco, p.descricao, p.estoque, p.categoria_id, c.nome as categoria_nome
                  FROM produtos p
                  INNER JOIN categorias c ON p.categoria_id = c.cid
                  ORDER BY p.nome";
        $connection = Connection::connect();
        $result = $connection->query($query);
        return $result->fetchAll();
    }

    public function carregar()
    {
        $query = "SELECT nome, preco, descricao, estoque, categoria_id FROM produtos WHERE pid = :pid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':pid', $this->pid);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nome = $row['nome'];
        $this->preco = $row['preco'];
        $this->descricao = $row['descricao'];
        $this->estoque = $row['estoque'];
        $this->categoria_id = $row['categoria_id'];
    }

    public function inserir($params = false)
    {
        $query = "INSERT INTO produtos (nome, preco, descricao, estoque, categoria_id)
                  VALUES (:nome, :preco, :descricao, :estoque, :categoria_id)";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':estoque', $this->estoque);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();
    }

    public function atualizar($params = false)
    {
        $query = "UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao, estoque = :estoque, categoria_id = :categoria_id 
                  WHERE pid = :pid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':estoque', $this->estoque);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':pid', $this->pid);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM produtos WHERE pid = :pid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue('pid', $this->pid);
        $stmt->execute();
    }

    public static function listarPorCategoria($categoria_id)
    {
        $query = "SELECT pid, nome, preco, descricao, estoque FROM produtos WHERE categoria_id = :categoria_id";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function listarPorVenda($venda_id)
    {
        $query = "SELECT p.pid, p.nome, p.preco, p.descricao, p.estoque, p.categoria_id, v.quantidade as quantidade
                  FROM produtos p
                  INNER JOIN venda_produto v ON p.pid = v.produto_id
                  WHERE v.venda_id = :venda_id
                  ORDER BY v.quantidade";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':venda_id', $venda_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function carregarVendas()
    {
        $this->vendas = Venda::listarPorProduto($this->pid);
    }

    public function isPid()
    {
        return $this->pid;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function getVendas()
    {
        return $this->vendas;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
}
