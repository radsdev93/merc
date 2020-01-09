<?php include __DIR__ . '/../inicio-html.php'; ?>
    <h3>Adicione os produtos da venda:</h3>

    <form action="/gravar-venda" method="post">
        <table class="table table-sm table-dark table-hover table-bordered text-center align-middle" id="venda">
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
                        <?= $produto['id'] ?>
                        <input type="hidden" value="<?= $produto['id'] ?>">
                    </td>
                    <td><?= $produto['nome'] ?></td>
                    <td><?= $produto['preco'] ?></td>
                    <td><?= $produto['valor_percentual'] ?></td>
                    <td><?= $produto['categoria_nome'] ?></td>
                    <td>
                        <input type='number' name='quantidade' value='1' min='0' max='100'/>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
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
    <script>
        $(document).ready( function () {
            var table = $('#venda').DataTable( {
                colReorder: true,
                // responsive: true,
                "pageLength": 50,
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