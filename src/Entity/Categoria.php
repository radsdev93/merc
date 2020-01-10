<?php

namespace RAdSDev93\MercLegacy\Entity;

use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Infra\Connection;

class Categoria implements EntityInterface
{
    use FlashMessageTrait;

    private $cid;
    private $nome;
    private $produtos;
    private $tributos;

    public function __construct($id = false)
    {
        if ($id) {
            $this->cid = $id;
            $this->carregar();
            $this->carregarTributos();
            $this->carregarProdutos();
        }
    }

    public static function listar()
    {
        $query = "SELECT cid, nome FROM categorias ORDER BY nome";
        $connection = Connection::connect();
        $result = $connection->query($query);
        return $result->fetchAll();
    }

    public function carregar()
    {
        $query = "SELECT cid, nome FROM categorias WHERE cid = :cid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':cid', $this->cid);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nome = $row['nome'];
    }

    public function inserir($params = false)
    {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function atualizar($params = false)
    {
        $query = "UPDATE categorias set nome = :nome WHERE cid = :cid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':cid', $this->cid);
        $stmt->execute();
        if ($params !== false) {
            foreach($this->produtos as $produto) {
                $p = new Produto($produto["pid"]);
                $p->setCategoriaId(CATEGORIA_PADRAO);
                $p->atualizar();
            }
            foreach($this->tributos as $tributo) {
                $t = new Tributo($tributo["tid"]);
                $t->setCategoriaId(CATEGORIA_PADRAO);
                $t->atualizar();
            }
            $produtos = $params["produtos"];
            $tributos = $params["tributos"];
            foreach ($produtos as $produto) {
                $p = new Produto($produto["pid"]);
                $p->setCategoriaId($this->cid);
                $p->atualizar();
            }
            foreach ($tributos as $tributo) {
                $t = new Tributo($tributo["tid"]);
                $t->setCategoriaId($this->cid);
                $t->atualizar();
            }
        }
    }

    public function excluir()
    {
        if($this->cid === CATEGORIA_PADRAO) {
            $this->setFlashMessage("danger", "Não é possível excluir a categoria-base!");
            header('Location: /listar-categorias');
            exit;
        }
        foreach($this->produtos as $produto) {
            $p = new Produto($produto["pid"]);
            $p->setCategoriaId(CATEGORIA_PADRAO);
            $p->atualizar();
        }
        foreach($this->tributos as $tributo) {
            $t = new Tributo($tributo["tid"]);
            $t->setCategoriaId(CATEGORIA_PADRAO);
            $t->atualizar();
        }
        $query = "DELETE FROM categorias WHERE cid = :cid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':cid', $this->cid);
        $stmt->execute();
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategoria($this->cid);
    }

    public function carregarTributos()
    {
        $this->tributos = Tributo::listarPorCategoria($this->cid);
    }

    public function isCid()
    {
        return $this->cid;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function getTributos()
    {
        return $this->tributos;
    }
}
