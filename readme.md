# Merc!

**Merc!** é um sistema de cadastro de produtos para os mais diversos tipos de lojas, relacionando produtos, categorias e impostos.

Esse projeto está sendo desenvolvido como parte de um processo seletivo para uma vaga de emprego, e por isso será disponibilizado sobre uma licença open source para que você possa estudar o código-fonte e criar seu próprio fork do **Merc!** caso queira!

A stack utilizada para o desenvolvimento do **Merc!** é:

* [PHP 5.6](https://www.php.net/releases/5_6_0.php);
* [PostgreSQL 9.4](https://www.postgresql.org/);
* [Composer 1.6.3](https://getcomposer.org/);
* [PHP PDO_PGSQL Extension](https://www.php.net/manual/en/ref.pdo-pgsql.php);
* [Bootstrap](https://getbootstrap.com/);
* [DataTables](https://datatables.net/);

Esse software contém:

## Entidades

#### Usuário
- [x] Cadastrode usuários com dois níveis:
	- [x] **Usuário Administrador** - consulta, criação, alteração, exclusão de usuários, 
			tributos, categorias e produtos, e criação e exclusão de registros de venda;
	- [x] **Usuário Operador** - consulta de usuários, tributos, categorias e produtos
			e criação e consulta de registros de vendas;
Contendo os seguintes atributos:
	- [x] ID do usuário;
	- [x] Nome do usuário;
	- [x] Email do usuário (usado para login);
	- [x] Senha do usuário;
	- [x] Data e horário de cadastro do usuário;
	- [x] Nível de acesso:
		- Administrador ou
		- Operador;


#### Categoria
- [x] Cadastro de Categorias com os seguintes atributos:
	- [x] ID da categoria;
	- [x] Nome da categoria;
	- [x] Lista de produtos atrelada à categoria;
	- [x] Lista de impostos atrelada à categoria;

#### Produto
- [x] Cadastro de Produtos com os seguintes atributos:
	- [x] ID do produto
	- [x] Nome do produto;
	- [x] Descrição do produto;
	- [x] Preço do produto;
	- [x] Categoria do produto;
	- [x] Quantidade do produto em estoque;

#### Tributo
- [x] Cadastro de Tributos com os seguintes atributos:
	- [x] ID do tributo;
	- [x] Nome do tributo;
	- [x] Descrição do tributo;
	- [x] Lista de categorias atreladas ao tributo;
	- [x] Valor percentual do tributo;

#### Venda
- [x] Cadastro de Vendas com os seguintes atributos:
	- [x] ID da venda;
	- [x] ID do usuário que registrou a venda;
	- [x] Lista de produtos atreladas à venda;
	- [x] Valor total dos produtos da venda;
	- [x] Valor total dos tributos da venda;
	- [x] Valor total dos produtos + tributos da venda;
	- [x] Data e hora do registro da venda;

## Telas

- [x] Tela inicial, com menu de opções:
	- [x] **Usuários**
		- [x] Lista de Usuários com opções de criar, alterar e excluir;
		- [x] Lista de usuários para consulta somente;
	- [x] **Tributos**
		- [x] Usuário administrador: Lista de tributos com opções de criar, alterar e excluir;
		- [x] Usuário operador: Lista de tributos para consulta somente;
	- [x] **Categorias**
		- [x] Usuário administrador: Lista de categorias com opções de criar, alterar e excluir;
		- [x] Usuário operador: Lista de categorias para consulta somente;
	- [x] **Produtos**
		- [x] Usuário administrador: Lista de produtos com opções de criar, alterar e excluir;
		- [x] Usuário operador: Lista de produtos para consulta somente;
	- [x] **Vendas**
		- [x] Usuário administrador: Lista de vendas com opções de criar e excluir;
		- [x] Usuário operador: Lista de vendas para consulta e criação somente;

As funcionalidades contidas nesse projeto poderão ser aumentadas, alteradas ou reduzidas conforme necessidade.
Acompanhe o repositório para manter-se informado sobre as mudanças.

## Deploy

#### Pré-requisitos:

- PHP 5.6.40;
- PostgreSQL Server 9.4.25;
- Servidor HTTP de sua preferência (Apache, NGINX, etc.);

##### Configurações do Banco de Dados:

- **Usuário**: postgres
- **Senha**: Merc@2020!

- Na pasta sql, localizada no diretório raiz do projeto, execute os comandos:
	- Criar banco de dados **merc**:
		`psql -h hostname -d merc -U postgres -f merc_create_database.sql`;
	
	- Criar as tabelas:
	`psql -h hostname -d merc -U postgres -f merc_create_tables.sql`;

	- Popular as tabelas com os valores inicias de demonstração:
	`psql -h hostname -d merc -U postgres -f merc_populate_tables.sql`;

- Ou se preferir, importe o arquivo *backup.sql*, com o backup completo do banco de dados;

#### Configurações do Projeto:

Após instalar e configurar propriamente os pré-requisitos no seu ambiente,
dentro do diretório raíz do projeto, execute as seguintes etapas:

1. (**Atenção!** Certifique-se de configurar a conexão com o banco de dados no arquivo **diretório_raíz**/config/config.php);

2. No diretório raíz do projeto, rode o comando `composer install`;

3. Pronto! É só subir o servidor configurando-o de tal forma que a aplicação seja servida à partir do diretório **public**!


#### Usuários de teste:

**Administrador**
- Email: *admin@merc.com*
- Senha: *merc*

**Operador**
- Email: *op@merc.com*
- Senha: *merc*
