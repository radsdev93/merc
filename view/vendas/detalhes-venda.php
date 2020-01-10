<?php include __DIR__ . '/../inicio-html.php' ?>
    <style>
        form {
            display: inline-block;
        }
    </style>
    <div class="row justify-content-center">
        <a href="/listar-vendas" class="btn btn-sm btn-primary">Voltar</a>
    </div>
    <br/>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Tributo Unitário</th>
            <th>Subtotal do Produto</th>
            <th>Subtotal do Tributo</th>
            <th>Subtotal Geral</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($produtos as $produto): ?>
            <tr>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['categoria_nome'] ?></td>
                <td><?= $produto['quantidade'] ?></td>
                <td><?= 'R$' . number_format($produto['preco'], 2, ',', '.') ?></td>
                <td><?= number_format($produto['tributo']['valor_percentual'], 2, ',', '.') . '%' ?></td>
                <td><?= 'R$' . number_format($produto['subtotal_produto'], 2, ',', '.') ?></td>
                <td><?= 'R$' . number_format($produto['subtotal_tributo'], 2, ',', '.') ?></td>
                <td><?= 'R$' . number_format($produto['subtotal'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php include __DIR__ . '/../fim-html.php' ?>