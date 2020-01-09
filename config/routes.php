<?php
/* LOGIN */
use RAdSDev93\MercLegacy\Controller\Auth\LoginForm;
use RAdSDev93\MercLegacy\Controller\Auth\Login;
use RAdSDev93\MercLegacy\Controller\Auth\Logout;
use RAdSDev93\MercLegacy\Controller\Home;
/* CREATE */
use RAdSDev93\MercLegacy\Controller\Create\CreateUsuario;
use RAdSDev93\MercLegacy\Controller\Create\CreateCategoria;
use RAdSDev93\MercLegacy\Controller\Create\CreateProduto;
use RAdSDev93\MercLegacy\Controller\Create\CreateTributo;
use RAdSDev93\MercLegacy\Controller\Create\CreateVenda;
/* READ */
use RAdSDev93\MercLegacy\Controller\Read\ListUsuario;
use RAdSDev93\MercLegacy\Controller\Read\ListCategoria;
use RAdSDev93\MercLegacy\Controller\Read\ListProduto;
use RAdSDev93\MercLegacy\Controller\Read\ListTributo;
use RAdSDev93\MercLegacy\Controller\Read\ListVenda;
use RAdSDev93\MercLegacy\Controller\Read\DetailVenda;
/* UPDATE */
use RAdSDev93\MercLegacy\Controller\Update\UpdateUsuario;
use RAdSDev93\MercLegacy\Controller\Update\UpdateCategoria;
use RAdSDev93\MercLegacy\Controller\Update\UpdateProduto;
use RAdSDev93\MercLegacy\Controller\Update\UpdateTributo;
use RAdSDev93\MercLegacy\Controller\Update\UpdateVenda;
/* DELETE */
use RAdSDev93\MercLegacy\Controller\Delete\DeleteUsuario;
use RAdSDev93\MercLegacy\Controller\Delete\DeleteCategoria;
use RAdSDev93\MercLegacy\Controller\Delete\DeleteProduto;
use RAdSDev93\MercLegacy\Controller\Delete\DeleteTributo;
use RAdSDev93\MercLegacy\Controller\Delete\DeleteVenda;
/* PERSIST */
use RAdSDev93\MercLegacy\Controller\Persist\PersistUsuario;
use RAdSDev93\MercLegacy\Controller\Persist\PersistCategoria;
use RAdSDev93\MercLegacy\Controller\Persist\PersistProduto;
use RAdSDev93\MercLegacy\Controller\Persist\PersistTributo;
use RAdSDev93\MercLegacy\Controller\Persist\PersistVenda;

return [
    /* LOGIN */
    '/entrar' => LoginForm::class,
    '/entrando' => Login::class,
    '/sair' => Logout::class,
    '/inicio' => Home::class,
    /* CREATE */
    '/registrar-usuario' => CreateUsuario::class,
    '/registrar-categoria' => CreateCategoria::class,
    '/registrar-produto' => CreateProduto::class,
    '/registrar-tributo' => CreateTributo::class,
    '/registrar-venda' => CreateVenda::class,
    /* READ */
    '/listar-usuarios' => ListUsuario::class,
    '/listar-categorias' => ListCategoria::class,
    '/listar-produtos' => ListProduto::class,
    '/listar-tributos' => ListTributo::class,
    '/listar-vendas' => ListVenda::class,
    '/detalhes-venda' => DetailVenda::class,
    /* UPDATE */
    '/atualizar-usuario' => UpdateUsuario::class,
    '/atualizar-categoria' => UpdateCategoria::class,
    '/atualizar-produto' => UpdateProduto::class,
    '/atualizar-tributo' => UpdateTributo::class,
    '/atualizar-venda' => UpdateVenda::class,
    /* DELETE */
    '/remover-usuario' => DeleteUsuario::class,
    '/remover-categoria' => DeleteCategoria::class,
    '/remover-produto' => DeleteProduto::class,
    '/remover-tributo' => DeleteTributo::class,
    '/remover-venda' => DeleteVenda::class,
    /* PERSIST */
    '/gravar-usuario' => PersistUsuario::class,
    '/gravar-categoria' => PersistCategoria::class,
    '/gravar-produto' => PersistProduto::class,
    '/gravar-tributo' => PersistTributo::class,
    '/gravar-venda' => PersistVenda::class,
];