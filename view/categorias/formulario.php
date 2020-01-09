<?php include __DIR__ . '/../inicio-html.php'; ?>
    <form action="/gravar-categoria" method="post">
        <input type="hidden" name="cid" id="cid" value="<?= isset($categoria) ? $categoria->isCid() : '' ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= isset($categoria) ? $categoria->getNome() : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/listar-categorias" class="btn btn-secondary">Cancelar</a>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>