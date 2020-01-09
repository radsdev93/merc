<?php include __DIR__ . '/../inicio-html.php'; ?>
    <form action="/gravar-usuario" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nivel">Nível</label>
            <select id="nivel" name="nivel" class="form-control" required>
                <option value="Administrador">Administrador</option>
                <option value="Operador">Operador</option>
            </select>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/listar-usuarios" class="btn btn-secondary">Cancelar</a>
    </form>
<?php include __DIR__ . '/../fim-html.php'; ?>