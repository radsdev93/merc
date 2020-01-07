<?php include __DIR__ . '/inicio-html.php'; ?>
    <table class="table table-sm table-dark table-hover table-bordered table-responsive text-center align-middle">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Cadastro</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $_SESSION['usuario']->getNome() ?></td>
            <td><?= $_SESSION['usuario']->getEmail() ?></td>
            <td><?= $_SESSION['usuario']->getDataCadastro()->format('d/m/Y H:i:s') ?></td>
            <td>
                <a class="btn btn-sm btn-outline-info" href="/atualizar-usuario?uid=<?= $_SESSION['uid'] ?>">Editar</a>
            </td>
        </tr>
        </tbody>
    </table>
<?php include __DIR__ . '/fim-html.php'; ?>