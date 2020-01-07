<?php

namespace RAdSDev93\MercLegacy\Entity;

use RAdSDev93\MercLegacy\Helper\FlashMessageTrait;
use RAdSDev93\MercLegacy\Infra\Connection;

class Usuario implements EntityInterface
{
    use FlashMessageTrait;

    private $uid;
    private $nome;
    private $email;
    private $senha;
    private $nivel;
    private $data_cadastro;
    private $vendas;

    public function __construct($id = false)
    {
        if ($id) {
            $this->uid = $id;
            $this->carregar();
            $this->carregarVendas();
        }
    }

    public static function listar()
    {
        $query = "SELECT uid, nome, email, nivel, data_cadastro FROM usuarios ORDER BY nome";
        $connection = Connection::connect();
        $result = $connection->query($query);
        return $result->fetchAll();
    }

    public function carregar()
    {
        $query = "SELECT uid, nome, email, nivel, data_cadastro FROM usuarios WHERE uid = :uid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':uid', $this->uid);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nome = $row['nome'];
    }

    public function inserir($params = false)
    {
        if($this->nivel !== "Administrador" || $this->nivel !== "Operador") {
            $this->setFlashMessage("danger", "Nível de usuário inexistente!");
            header('Location: /listar-usuarios');
            return;
        }
        $query = "INSERT INTO usuarios (nome, email, nivel, senha, data_cadastro) 
                  VALUES (:nome, :email, :nivel, :senha, :data_cadastro)";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':nivel', $this->nivel);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(':data_cadastro', $this->data_cadastro);
        $stmt->execute();
    }

    public function atualizar($params = false)
    {
        if($this->nivel !== "Administrador" || $this->nivel !== "Operador") {
            $this->setFlashMessage("danger", "Nível de usuário inexistente!");
            header('Location: /listar-usuarios');
            return;
        }
        $query = "UPDATE usuarios set nome = :nome, email = :email, nivel = :nivel, senha = :senha WHERE uid = :uid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':nivel', $this->nivel);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(':uid', $this->uid);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM usuarios WHERE uid = :uid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':uid', $this->uid);
        $stmt->execute();
    }

    public function carregarVendas()
    {
        $this->vendas = Venda::listarPorUsuario($this->uid);
    }
}
