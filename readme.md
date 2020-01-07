# Merc!

**Merc!** é um sistema de cadastro de produtos para os mais diversos tipos de lojas, relacionando produtos, categorias e impostos.

Esse projeto está sendo desenvolvido como parte de um processo seletivo para uma vaga de emprego, e por isso será disponibilizado sobre uma licença open source para que você possa estudar o código-fonte e criar seu próprio fork do **Merc!** caso queira!

A stack utilizada para o desenvolvimento do **Merc!** é:

* [PHP 5.6](https://www.php.net/releases/5_6_0.php);
* [PostgreSQL 9.4](https://www.postgresql.org/);
* [Composer 1.6.3](https://getcomposer.org/);
* [PHP PDO_PGSQL Extension](https://www.php.net/manual/en/ref.pdo-pgsql.php);
* [Bootstrap](https://getbootstrap.com/) - é adicionado seguindo as instruções adiante neste arquivo (através do Composer);

Esse software contém:

##Entidades

####Usuário
- [ ] Cadastrode usuários com dois níveis:
	- [ ] **Usuário Administrador** - consulta, criação, alteração, exclusão de usuários, 
			tributos, categorias e produtos, e criação e exclusão de registros de venda;
	- [ ] **Usuário Operador** - consulta de tributos, categorias e produtos
			e criação e consulta de registros de vendas;
Contendo os seguintes atributos:
	- [ ] ID do usuário;
	- [ ] Nome do usuário;
	- [ ] Email do usuário (usado para login);
	- [ ] Senha do usuário;
	- [ ] Data e horário de cadastro do usuário;
	- [ ] Nível de acesso:
		- Administrador ou
		- Operador;


####Categoria
- [ ] Cadastro de Categorias com os seguintes atributos:
	- [ ] ID da categoria;
	- [ ] Nome da categoria;
	- [ ] Lista de produtos atrelada à categoria;
	- [ ] Lista de impostos atrelada à categoria;

####Produto
- [ ] Cadastro de Produtos com os seguintes atributos:
	- [ ] ID do produto
	- [ ] Nome do produto;
	- [ ] Descrição do produto;
	- [ ] Preço do produto;
	- [ ] Categoria do produto;
	- [ ] Quantidade do produto em estoque;

####Tributo
- [ ] Cadastro de Tributos com os seguintes atributos:
	- [ ] ID do tributo;
	- [ ] Nome do tributo;
	- [ ] Descrição do tributo;
	- [ ] Lista de categorias atreladas ao tributo;
	- [ ] Valor percentual do tributo;

####Venda
- [ ] Cadastro de Vendas com os seguintes atributos:
	- [ ] ID da venda;
	- [ ] ID do usuário que registrou a venda;
	- [ ] Lista de produtos atreladas à venda;
	- [ ] Valor total dos produtos da venda;
	- [ ] Valor total dos tributos da venda;
	- [ ] Valor total dos produtos + tributos da venda;
	- [ ] Data e hora do registro da venda;

##Telas

- [ ] Tela inicial, com menu de opções:
	- [ ] **Usuários** (somente para usuário administrador);
		- [ ] Lista de Usuários com opções de criar, alterar e excluir;
	- [ ] **Tributos**
		- [ ] Usuário administrador: Lista de tributos com opções de criar, alterar e excluir;
		- [ ] Usuário operador: Lista de tributos para consulta somente;
	- [ ] **Categorias**
		- [ ] Usuário administrador: Lista de categorias com opções de criar, alterar e excluir;
		- [ ] Usuário operador: Lista de categorias para consulta somente;
	- [ ] **Produtos**
		- [ ] Usuário administrador: Lista de produtos com opções de criar, alterar e excluir;
		- [ ] Usuário operador: Lista de produtos para consulta somente;
	- [ ] **Vendas**
		- [ ] Usuário administrador: Lista de vendas com opções de criar e excluir;
		- [ ] Usuário operador: Lista de vendas para consulta e criação somente;

As funcionalidades contidas nesse projeto poderão ser aumentadas, alteradas ou reduzidas conforme necessidade.
Acompanhe o repositório para manter-se informado sobre as mudanças.

##Deploy

####Pré-requisitos:

- PHP 5.6.40;
- PostgreSQL Server 9.4.25;
- Servidor HTTP de sua preferência (Apache, NGINX, etc.);

#####Configurações do Banco de Dados:

**Usuário**: postgres
**Senha**: Merc@2020!

- Na pasta sql, localizada no diretório raiz do projeto, execute os comandos:
	- Criar banco de dados **merc**:
		`psql -h hostname -d merc -U postgres -f merc_create_database.sql`;
	
	- Criar as tabelas:
	`psql -h hostname -d merc -U postgres -f merc_create_tables.sql`;

	- Popular as tabelas com os valores inicias de demonstração:
	`psql -h hostname -d merc -U postgres -f merc_populate_tables.sql`;

####Configurações do Projeto:

Após instalar e configurar propriamente os pré-requisitos no seu ambiente,
dentro do diretório raíz do projeto, execute as seguintes etapas:

1. (**Atenção!** Certifique-se de configurar a conexão com o banco de dados no arquivo **diretório_raíz**/config/config.php);

2. No diretório raíz do projeto, rode o comando `composer install`;

3. Pronto! É só subir o servidor configurando-o de tal forma que a aplicação seja servida à partir do diretório **public**!


####Usuários de teste:

**Administrador**
- Email: *admin@merc.com*
- Senha: *merc*

**Operador**
- Email: *op@merc.com*
- Senha: *merc*