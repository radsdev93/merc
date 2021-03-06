<?php include __DIR__ . '/../inicio-html.php' ?>
    <style>
        form {
            display: inline-block;
        }
    </style>
    <div class="alert alert-dismissible alert-warning text-center fade show" role="alert">
        As categorias são atribuídas aos produtos e tributos nas suas respectivas páginas!<br/>
        Ao excluir uma categoria, todos os produtos e tributos relacionados à ela receberão a categoria-base em seu lugar!
    </div>
    <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
    <div class="row justify-content-center">
        <a href="/registrar-categoria" class="btn btn-sm btn-success">Registrar nova categoria</a>
    </div>
    <br/>
    <?php endif ?>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>Nome</th>
            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <th>Ações</th>
            <?php endif ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria['nome'] ?></td>
                <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <td>
                    <div>
                        <form action="/atualizar-categoria" method="post">
                            <input type="hidden" name="cid" id="cid" value="<?= $categoria['cid'] ?>">
                            <button id="cid" type="submit" class="btn btn-sm btn-outline-info" >Editar</button>
                        </form>
                        <form action="/remover-categoria" method="post">
                            <input type="hidden" name="cid" value="<?= $categoria['cid'] ?>">
                            <button id="cid" type="submit" class="btn btn-sm btn-outline-danger" >Excluir</button>
                        </form>
                    </div>
                </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php include __DIR__ . '/../fim-html.php' ?>