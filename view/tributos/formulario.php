<?php include __DIR__ . '/../inicio-html.php'; ?>
    <form action="/gravar-tributo" method="post">
        <input type="hidden" name="tid" id="tid" value="<?= isset($tributo) ? $tributo->isTid() : '' ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= isset($tributo) ? $tributo->getNome() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= isset($tributo) ? $tributo->getDescricao() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="estoque">Valor Percentual</label>
            <input type="number" step="0.01" min="0" max="100" id="valor_percentual" name="valor_percentual" class="form-control" value="<?= isset($tributo) ? $tributo->getValorPercentual() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select id="categoria_id" name="categoria_id" class="form-control" required>
                <?php foreach($categorias as $categoria): ?>
                <option value="<?= $categoria['cid'] ?>" <?= isset($tributo) && $categoria['cid'] == $tributo->getCategoriaId() ? 'selected' : '' ?>>
                    <?= $categoria['nome'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/listar-tributos" class="btn btn-secondary">Cancelar</a>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>