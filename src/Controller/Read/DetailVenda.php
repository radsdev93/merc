<?php

namespace RAdSDev93\MercLegacy\Controller\Read;

use RAdSDev93\MercLegacy\Controller\RequestHandlerInterface;
use RAdSDev93\MercLegacy\Entity\Produto;
use RAdSDev93\MercLegacy\Entity\Usuario;
use RAdSDev93\MercLegacy\Entity\Venda;
use RAdSDev93\MercLegacy\Helper\RenderViewTrait;

class DetailVenda implements RequestHandlerInterface
{
    use RenderViewTrait;

    private $vendasPorProduto;
    private $vendasPorUsuarios;

    public function handle()
    {
        $venda = new Venda();
        $usuario = new Usuario();
        $produto = new Produto();
        $usuarios = $usuario->listar();
        $produtos = $produto->listar();
        foreach($usuarios as $usuario) {
            $vendasPorUsuarios[] = $venda->listarPorUsuario($usuario['uid']);
        }
        foreach($produtos as $produto) {
            $vendasPorProduto[] = $venda->listarPorProduto($produto['pid']);
        }

        $this->listaDeVendas = $vendas->listar();
        echo $html = $this->renderView('produtos/listar-vendas.php', [
            'vendasPorProduto' => $this->vendasPorProduto,
            'vendasPorUsuarios' => $this->vendasPorUsuarios,
            'titulo' => 'Vendas',
        ]);
    }
}