<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Merc!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</head>
<body>
<?php if(isset($_SESSION['logado'])): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
        <a class="navbar-brand" href="/inicio">Merc!</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/listar-usuarios">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/listar-categorias">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/listar-produtos">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/listar-tributos">Tributos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/listar-vendas">Vendas</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="btn btn-sm btn-outline-light" href="/sair">Sair</a>
            </li>
        </ul>
    </nav>
<?php endif ?>
<div class="container">
    <div class="jumbotron text-center">
        <h1><?= $titulo; ?></h1>
    </div>
    <?php if(isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?>">
        <?= $_SESSION['mensagem'] ?>
    </div>
<?php
unset($_SESSION['mensagem']);
unset($_SESSION['tipo_mensagem']);
endif;
?>