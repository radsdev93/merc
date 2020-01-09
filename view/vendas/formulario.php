<?php include __DIR__ . '/../inicio-html.php'; ?>
<?php
echo '<pre>';
var_dump($categorias);
var_dump($produtos);
echo '</pre>';
?>
    <h3>Adicione os produtos da venda:</h3>

    <form action="/gravar-venda" method="post">
        <input type="hidden" name="usuario_id" id="usuario_id" value="<?= isset($venda) ? $venda->getUsuarioId() : '' ?>">
        <div class="form-group">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php foreach($categorias as $categoria): ?>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-<?= $categoria['cid'] ?> role="tab" aria-controls="pills-profile" aria-selected="false"><?= $categoria['nome'] ?></a>
                </li>
                <?php endforeach ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <?php foreach ($categorias as $categoria): ?>
                <div class="tab-pane fade" id="pills-<?= $categoria['cid'] ?>>" role="tabpanel" aria-labelledby="pills-<?= $categoria['cid'] ?>-tab">
                    <?php foreach($produtos as $produto): ?>
                    <?php if($produto['categoria_id'] == $categoria['cid']): ?>
                    <p><?= $produto['nome'] ?></p>
                    <?php endif ?>
                    <?php endforeach ?>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="col-1">
            <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            <div class="col-1">
                <a href="/listar-vendas" class="btn btn-secondary">Cancelar</a>

            </div>
        </div>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>