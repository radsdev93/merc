CREATE TABLE IF NOT EXISTS usuarios (
  uid SERIAL NOT NULL,
  nome TEXT NOT NULL,
  email TEXT NOT NULL,
  senha TEXT NOT NULL,
  nivel TEXT NOT NULL,
  data_cadastro TIMESTAMP NOT NULL,
  PRIMARY KEY (uid));

CREATE TABLE IF NOT EXISTS categorias (
  cid SERIAL NOT NULL,
  nome TEXT NOT NULL,
  PRIMARY KEY (cid));

CREATE TABLE IF NOT EXISTS tributos (
  tid SERIAL NOT NULL,
  nome TEXT NOT NULL,
  descricao TEXT NOT NULL,
  valor_percentual DECIMAL(3,2) NOT NULL,
  categoria_id SERIAL NOT NULL,
  PRIMARY KEY (tid),
  CONSTRAINT fk_tributo_categoria_id
    FOREIGN KEY (categoria_id)
    REFERENCES categorias (cid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS produtos (
  pid SERIAL NOT NULL,
  nome TEXT NOT NULL,
  descricao TEXT NOT NULL,
  estoque INTEGER NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  categoria_id SERIAL NOT NULL,
  PRIMARY KEY (pid),
  CONSTRAINT fk_produto_categoria_id
    FOREIGN KEY (categoria_id)
    REFERENCES categorias (cid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS vendas (
  vid SERIAL NOT NULL,
  usuario_id SERIAL NOT NULL,
  valor_produtos DECIMAL(10,2) NOT NULL,
  valor_tributos DECIMAL(10,2) NOT NULL,
  valor_total DECIMAL(10,2) NOT NULL,
  data_registro TIMESTAMP NOT NULL,
  PRIMARY KEY (vid),
  CONSTRAINT fk_venda_usuario_id
    FOREIGN KEY (usuario_id)
    REFERENCES usuarios (uid)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);

CREATE TABLE IF NOT EXISTS venda_produto (
  venda_id SERIAL NOT NULL,
  produto_id SERIAL NOT NULL,
  quantidade INTEGER NOT NULL,
  PRIMARY KEY (venda_id, produto_id),
  CONSTRAINT fk_venda_produto_venda_id
    FOREIGN KEY (venda_id)
    REFERENCES vendas (vid)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_venda_produto_produto_id
    FOREIGN KEY (produto_id)
    REFERENCES produtos (pid)
    ON DELETE CASCADE
    ON UPDATE CASCADE);