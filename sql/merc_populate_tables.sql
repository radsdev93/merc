INSERT INTO usuarios (nome, email, senha, nivel, data_cadastro) VALUES ('Merc Admin', 'admin@merc.com', '$2y$10$KTvLZ2SdwkgnQeoApgsCTO82He.xEyV.Y6yxy/6SBo1L/m/5dIALm', 'Administrador', '2020-01-01 00:00:00');
INSERT INTO usuarios (nome, email, senha, nivel, data_cadastro) VALUES ('Merc Operador', 'op@merc.com', '$2y$10$KTvLZ2SdwkgnQeoApgsCTO82He.xEyV.Y6yxy/6SBo1L/m/5dIALm', 'Operador', '2020-01-01 00:00:00');
INSERT INTO categorias (nome) VALUES ('Categoria Padrão');
INSERT INTO categorias (nome) VALUES ('Categoria Nova');
INSERT INTO tributos (nome, descricao, valor_percentual, categoria_id) VALUES ('Tributo Padrão', 'Tributo padrão.', '1,97', '1');
INSERT INTO tributos (nome, descricao, valor_percentual, categoria_id) VALUES ('Tributo Novo', 'Tributo novo.', '25', '2');
INSERT INTO produtos (nome, descricao, estoque, preco, categoria_id) VALUES ('Produto 01', 'Descrição do produto.', '10', '59.90', '1');
INSERT INTO produtos (nome, descricao, estoque, preco, categoria_id) VALUES ('Produto 02', 'Descrição do produto.', '10', '109.90', '2');