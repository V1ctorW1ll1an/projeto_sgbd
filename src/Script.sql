-- criar banco de dados
create database Comercio character set utf8mb4;

-- usar banco de dados
use Comercio;

-- criar tabela de clientes
create table cliente(
	codigo int auto_increment primary key,
	primeiro_nome varchar(100),
	segundo_nome varchar(100),
	data_nascimento date,
	rg varchar(15) unique,
	fone varchar(20),
	cep varchar(15),
	cidade varchar(100),
	endereco varchar(200),
	cpf varchar(15) unique
);

-- criar tabela de vendas
create table vendas(
	codigo int auto_increment primary key,
	codigo_cliente int,
	valor_parcial decimal(20,2),
	valor_desconto decimal(20,2),
	valor_acrescimo decimal(20,2),
	valor_total decimal(20,2),
	data date,
	foreign key (codigo_cliente) references cliente(codigo) 
);

SELECT * FROM cliente;

INSERT INTO `cliente` (`codigo`, `primeiro_nome`, `segundo_nome`, `data_nascimento`, `rg`, `fone`, `cep`, `cidade`, `endereco`, `cpf`) VALUES (NULL, 'victor', 'willian', '1998-12-10', '49.690.063-8', '319987283721', '69151-587', 'ipatinga', 'cidade nobre n 30', '456.169.150-25');