<?php include __DIR__ . '/../inicio-html.php'; ?>

    <form action="/gravar-categoria<?= isset($categoria) ? '?cid=' . $categoria->getCid() : ''; ?>" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= isset($categoria) ? $categoria->getNome() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="usuarios">Produtos</label>
            <select class="selectpicker" multiple data-live-search="true" name="produtos">
                <?php foreach($produtos  as $produto): ?>
                    <option value="<?= $produto->getPid() ?>"><?= $produto->getNome() ?></option>
                <?php endforeach ?>
            </select>
            <script>
                $('select').selectpicker();
            </script>
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>