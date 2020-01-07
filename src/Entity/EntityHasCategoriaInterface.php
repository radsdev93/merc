<?php

namespace RAdSDev93\MercLegacy\Entity;


interface EntityHasCategoriaInterface extends EntityInterface
{
    public static function listarPorCategoria($categoria_id);
}
