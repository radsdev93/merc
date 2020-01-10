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
        $query = "SELECT uid, nome, email, senha, nivel, data_cadastro FROM usuarios WHERE uid = :uid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':uid', $this->uid);
        $stmt->execute();
        $row = $stmt->fetch();
        $this->nome = $row['nome'];
        $this->email = $row['email'];
        $this->senha = $row['senha'];
        $this->nivel = $row['nivel'];
        $this->data_cadastro = $row['data_cadastro'];
    }

    public function inserir($params = false)
    {
        if($this->nivel != "Administrador" && $this->nivel != "Operador") {
            $this->setFlashMessage("danger", "Nível de usuário inexistente!");
            header('Location: /inicio');
            exit;
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
        $query = "UPDATE usuarios set nome = :nome, email = :email, senha = :senha WHERE uid = :uid";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->bindValue(':uid', $this->uid);
        return $stmt->execute();
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

    public function validaSenha($senha)
    {
        return password_verify($senha, $this->senha);
    }

    public function validaLoginEmail($email)
    {
        $query = "SELECT uid FROM usuarios WHERE email = :email";
        $connection = Connection::connect();
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function isUid()
    {
        return $this->uid;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function getVendas()
    {
        return $this->vendas;
    }

}
