<?php include __DIR__ . '/../inicio-html.php' ?>
    <style>
        form {
            display: inline-block;
        }
    </style>
    <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
    <div class="row justify-content-center">
        <a href="/registrar-tributo" class="btn btn-sm btn-success">Registrar novo tributo</a>
    </div>
    <br/>
    <?php endif ?>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor Percentual</th>
            <th>Categoria</th>
            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <th>Ações</th>
            <?php endif ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($tributos as $tributo): ?>
            <tr>
                <td><?= $tributo['nome'] ?></td>
                <td><?= $tributo['descricao'] ?></td>
                <td><?= number_format($tributo['valor_percentual'], 2, ',','.') . '%' ?></td>
                <td><?= $tributo['categoria_nome'] ?></td>
                <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <td>
                    <div>
                        <form action="/atualizar-tributo" method="post">
                            <input type="hidden" name="tid" id="tid" value="<?= $tributo['tid'] ?>">
                            <button id="tid" type="submit" class="btn btn-sm btn-outline-info" >Editar</button>
                        </form>
                        <form action="/remover-tributo" method="post">
                            <input type="hidden" name="tid" value="<?= $tributo['tid'] ?>">
                            <button id="tid" type="submit" class="btn btn-sm btn-outline-danger" >Excluir</button>
                        </form>
                    </div>
                </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php include __DIR__ . '/../fim-html.php' ?>