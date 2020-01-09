<?php include __DIR__ . '/inicio-html.php' ?>
    <div class="alert alert-dismissible alert-info text-center fade show" role="alert">
        Use o menu superior para navegar pelo sistema!
    </div>
    <h2 class="text-center">Meu Usuário</h2>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Nível</th>
            <th>Data de Cadastro</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $usuario->getNome() ?></td>
            <td><?= $usuario->getEmail() ?></td>
            <td><?= $usuario->getNivel() ?></td>
            <td>
                <?php
                    $date = new DateTime($usuario->getDataCadastro());
                    echo $date->format('d/m/Y H:i:s');
                ?>
            </td>
            <td>
                <form action="/atualizar-usuario" method="post">
                <input type="hidden" name="uid" id="uid" value="<?= $_SESSION['uid'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-info" >Editar</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
<?php include __DIR__ . '/fim-html.php'; ?>