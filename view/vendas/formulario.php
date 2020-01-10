<?php include __DIR__ . '/../inicio-html.php'; ?>
    <h3>Adicione os produtos da venda:</h3>
    <form action="/gravar-venda" method="post">
        <table id="venda" class="table table-sm table-striped table-bordered dt-responsive nowrap text-center" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço Unitário</th>
                    <th>Impostos</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($produtos as $produto): ?>
                <tr>
                    <td>
                        <?= $produto['pid'] ?>
                        <input type="hidden" name= "pid[]" value="<?= $produto['pid'] ?>">
                    </td>
                    <td>
                        <?= $produto['nome'] ?>
                        <input type="hidden" name= "nome[]" value="<?= $produto['nome'] ?>">
                    </td>
                    <td>
                        <?= 'R$' . number_format($produto['preco'], 2,',','.') ?>
                        <input type="hidden" name= "preco[]" value="<?= $produto['preco'] ?>">
                    </td>
                    <td>
                        <?= $produto['valor_tributo'] . '%' ?>
                        <input type="hidden" name= "valor_tributo[]" value="<?= $produto['valor_tributo'] ?>">
                    </td>
                    <td>
                        <?= $produto['categoria_nome'] ?>
                        <input type="hidden" name= "categoria_nome[]" value="<?= $produto['categoria_nome'] ?>">
                    </td>
                    <td>
                        <input type='number' name='quantidade[]' value='0' min='0' max='100'/>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <br/>
        <div class="row justify-content-center">
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            <div class="col-1">
                <a href="/listar-vendas" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
    <script>
        $(document).ready( function () {
            var table = $('#venda').DataTable( {
                colReorder: true,
                // responsive: true,
                "pageLength": 10,
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    }
                },
                "scrollX": true
            });
        });
    </script>
<?php include __DIR__ . '/../fim-html.php'; ?>