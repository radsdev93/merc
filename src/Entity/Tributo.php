<?php


namespace RAdSDev93\MercLegacy\Entity;

use RAdSDev93\MercLegacy\Infra\Connection;

class Tributo implements EntityHasCategoriaInterface
{
    private $tid;
    private $nome;
    private $descricao;
    private $valor_percentual;
    private $categoria_id;

    public function __construct($id = false)
    {
        if ($id) {
            $this->tid = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT t.tid, t.nome, t.descricao, t.valor_percentual, t.categoria_id, c.nome as categoria_nome
                  FROM tributos t
                  INNER JOIN categorias c ON t.categoria_id = c.cid
                  ORDER BY t.nome";
        $connection = Connection::connect();
        $result = $connection->query($query);
        return $result->fetchAll();
    }

    public function carregar()
    {
        $query = "SELECT nome, descricao, valor_percentual, categoria_id FROM tributos WHERE tid = :tid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':tid', $this->tid);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nome = $row['nome'];
        $this->descricao = $row['descricao'];
        $this->valor_percentual = $row['valor_percentual'];
        $this->categoria_id = $row['categoria_id'];
    }

    public function inserir($params = false)
    {
        $query = "INSERT INTO tributos (nome, descricao, valor_percentual, categoria_id)
                  VALUES (:nome, :descricao, :valor_percentual, :categoria_id)";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':valor_percentual', $this->valor_percentual);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();
    }

    public function atualizar($params = false)
    {
        $query = "UPDATE tributos SET nome = :nome, descricao = :descricao, valor_percentual = :valor_percentual, 
                  categoria_id = :categoria_id WHERE tid = :tid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':valor_percentual', $this->valor_percentual);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':tid', $this->tid);
        return $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM tributos WHERE tid = :tid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue('tid', $this->tid);
        $stmt->execute();
    }

    public static function listarPorCategoria($categoria_id)
    {
        $query = "SELECT tid, nome, descricao, valor_percentual FROM tributos WHERE categoria_id = :categoria_id";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getValorPercentual()
    {
        return $this->valor_percentual;
    }

    public function setValorPercentual($valor_percentual)
    {
        $this->valor_percentual = $valor_percentual;
    }
    
    public function isTid()
    {
        return $this->tid;
    }
}
