<?php include __DIR__ . '/../inicio-html.php' ?>
    <div class="alert alert-warning text-center">
        Atenção! Por razões de compliance, não é possível alterar o nível de um usuário!
        É necessário criar outro e excluir o atual (na lista de Usuários).
    </div>
    <form action="/gravar-usuario" method="post">
        <?php if($_SESSION['uid'] === $usuario->isUid()): ?>
        <input type="hidden" name="self" id="self" value="true">
        <?php endif ?>
        <input type="hidden" name="uid" id="uid" value="<?= isset($usuario) ? $usuario->isUid() : '' ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= isset($usuario) ? $usuario->getNome() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= isset($usuario) ? $usuario->getEmail() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="Deixe vazio para não mudar a senha!">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/inicio" class="btn btn-secondary">Cancelar</a>
    </form>
<?php include __DIR__ . '/../fim-html.php' ?>