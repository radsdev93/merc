<?php

namespace RAdSDev93\MercLegacy\Entity;


interface EntityInterface
{
    public function __construct($id = false);
    public static function listar();
    public function carregar();
    public function inserir($params = false);
    public function atualizar($params = false);
    public function excluir();
}
