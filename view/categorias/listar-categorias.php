<?php include __DIR__ . '/../inicio-html.php'; ?>

    <a href="/registrar-categoria" class="btn btn-primary mb-2">
        Adicionar Categoria
    </a>

    <table class="table table-sm table-dark table-hover table-bordered table-responsive text-center align-middle">
        <thead>
            <th>Nome</th>
            <th>Produtos</th>
            <td>Ações</td>
        </thead>
        <tbody>
        <?php foreach($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria->getNome() ?></td>
                <td>
                    <ul class="list-group">
                    <?php foreach($produto as $p): ?>
                        <li class="list-group-item">
                            <?= $p->getNome() ?>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </td>
                <td>
                    <span>
                        <a href="/atualizar-categoria" class="btn btn-sm btn-outline-info">Editar</a>
                        <a href="/remover-categoria" class="btn btn-sm btn-outline-danger">Excluir</a>
                    </span>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

<?php include __DIR__ . '/../fim-html.php'; ?>