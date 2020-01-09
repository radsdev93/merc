<?php include __DIR__ . '/../inicio-html.php'; ?>
    <form action="/gravar-produto" method="post">
        <input type="hidden" name="pid" id="pid" value="<?= isset($produto) ? $produto->isPid() : '' ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?= isset($produto) ? $produto->getNome() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" min="0" id="preco" name="preco" class="form-control" value="<?= isset($produto) ? $produto->getPreco() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= isset($produto) ? $produto->getDescricao() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <input type="number" step="1" min="0" id="estoque" name="estoque" class="form-control" value="<?= isset($produto) ? $produto->getEstoque() : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select id="categoria_id" name="categoria_id" class="form-control" required>
                <?php foreach($categorias as $categoria): ?>
                <option value="<?= $categoria['cid'] ?>" <?= isset($produto) && $categoria['cid'] == $produto->getCategoriaId() ? 'selected' : '' ?>>
                    <?= $categoria['nome'] ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/listar-produtos" class="btn btn-secondary">Cancelar</a>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>