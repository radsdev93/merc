<?php include __DIR__ . '/../inicio-html.php' ?>
    <style>
        form {
            display: inline-block;
        }
    </style>
    <div class="row justify-content-center">
        <a href="/registrar-venda" class="btn btn-sm btn-success">Registrar nova venda</a>
    </div>
    <br/>
    <table class="table table-sm table-dark table-hover table-bordered text-center align-middle">
        <thead>
        <tr>
            <th>ID</th>
            <th>Vendedor</th>
            <th>Registro</th>
            <th>Valor Produtos</th>
            <th>Valor Tributos</th>
            <th>Valor Total</th>
            <th>Detalhes</th>
            <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <th>Ações</th>
            <?php endif ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($vendas as $venda): ?>
            <tr>
                <td><?= $venda['vid'] ?></td>
                <td><?= $venda['usuario_nome'] ?></td>
                <td>
                    <?php
                    $date = new DateTime($venda['data_registro']);
                    echo $date->format('d/m/Y H:i:s');
                    ?>
                </td>
                <td><?= 'R$' . number_format($venda['valor_produtos'], 2,',','.') ?></td>
                <td><?= 'R$' . number_format($venda['valor_tributos'], 2,',','.') ?></td>
                <td><?= 'R$' . number_format($venda['valor_total'], 2,',','.') ?></td>
                <td>
                    <div>
                        <form action="/detalhes-venda" method="post">
                            <input type="hidden" name="vid" id="vid" value="<?= $venda['vid'] ?>">
                            <button id="vid" type="submit" class="btn btn-sm btn-outline-secondary">Ver Detalhes</button>
                        </form>
                    </div>
                </td>
                <?php if(isset($_SESSION['nivel']) && $_SESSION['nivel'] === "Administrador"): ?>
                <td>
                    <div>
                        <form action="/remover-venda" method="post">
                            <input type="hidden" name="vid" value="<?= $venda['vid'] ?>">
                            <button id="vid" type="submit" class="btn btn-sm btn-outline-danger" >Excluir</button>
                        </form>
                    </div>
                </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php include __DIR__ . '/../fim-html.php' ?>