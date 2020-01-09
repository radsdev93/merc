<?php include __DIR__ . '/../inicio-html.php' ?>
<style>
    form {
        display: inline-block;
    }
</style>
    <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
    <div class="row justify-content-center">
        <a href="/registrar-usuario" class="btn btn-sm btn-success">Registrar novo usuário</a>
    </div>
    <br/>
    <?php endif ?>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Nível</th>
            <th>Data de Cadastro</th>
            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
            <th>Ações</th>
            <?php endif ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['nivel'] ?></td>
            <td>
                <?php
                $date = new DateTime($usuario['data_cadastro']);
                echo $date->format('d/m/Y H:i:s');
                ?>
            </td>
            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
            <td>
                <div>
                <form action="/atualizar-usuario" method="post">
                    <input type="hidden" name="uid" id="uid" value="<?= $usuario['uid'] ?>">
                    <button id="uid" type="submit" class="btn btn-sm btn-outline-info" >Editar</button>
                </form>
                <form action="/remover-usuario" method="post">
                    <input type="hidden" name="uid" value="<?= $usuario['uid'] ?>">
                    <button id="uid" type="submit" class="btn btn-sm btn-outline-danger" >Excluir</button>
                </form>
                </div>
            </td>
            <?php endif ?>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php include __DIR__ . '/../fim-html.php' ?>