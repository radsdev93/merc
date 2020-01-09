<?php include __DIR__ . '/../inicio-html.php' ?>
    <style>
        form {
            display: inline-block;
        }
    </style>
    <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
    <div class="row justify-content-center">
        <a href="/registrar-produto" class="btn btn-sm btn-success">Registrar novo produto</a>
    </div>
    <br/>
    <?php endif ?>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Categoria</th>
            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <th>Ações</th>
            <?php endif ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($produtos as $produto): ?>
            <tr>
                <td><?= $produto['nome'] ?></td>
                <td><?= 'R$' . number_format($produto['preco'], 2,',','.') ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td><?= $produto['estoque'] ?></td>
                <td><?= $produto['categoria_nome'] ?></td>
                <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <td>
                    <div>
                        <form action="/atualizar-produto" method="post">
                            <input type="hidden" name="pid" id="pid" value="<?= $produto['pid'] ?>">
                            <button id="pid" type="submit" class="btn btn-sm btn-outline-info" >Editar</button>
                        </form>
                        <form action="/remover-produto" method="post">
                            <input type="hidden" name="pid" value="<?= $produto['pid'] ?>">
                            <button id="pid" type="submit" class="btn btn-sm btn-outline-danger" >Excluir</button>
                        </form>
                    </div>
                </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php include __DIR__ . '/../fim-html.php' ?>