-- Desativar temporariamente algumas verificações para evitar erros durante a criação das tabelas
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS TCC24IFES;
USE TCC24IFES;


CREATE TABLE IF NOT EXISTS Vendedor (
  idVendedor INT NOT NULL AUTO_INCREMENT,
  nomeVendedor VARCHAR(45) NOT NULL, 
  descricaoVendedor VARCHAR(45) ,  
  emailVendedor VARCHAR(45) NOT NULL,  
  telefoneVendedor VARCHAR(15),
  celularVendedor VARCHAR(15),
  tipoVendedor INT NOT NULL , 
  CNPJ_CPF VARCHAR(45) NOT NULL,  
  imgVendedor LONGBLOB , 
  razaoSocial VARCHAR(100) ,  
  senhaVendedor VARCHAR(45) NOT NULL,
  data_nascimentoVendedor DATE ,
  inscricaoEstadual varchar(45),
  PRIMARY KEY (idVendedor), 
  UNIQUE (CNPJ_CPF),  
  UNIQUE (emailVendedor)  
);


CREATE TABLE IF NOT EXISTS Comprador (
  idComprador INT NOT NULL AUTO_INCREMENT,  
  nomeComprador VARCHAR(45) NOT NULL,  
  emailComprador VARCHAR(45) NOT NULL,  
  telefoneComprador VARCHAR(45) NOT NULL,  
  data_nascimentoComprador DATE NOT NULL,  
  CPF VARCHAR(45) NOT NULL,  
  imgComprador LONGBLOB, 
  senhaComprador VARCHAR(45) NOT NULL,  
  PRIMARY KEY (idComprador), 
  UNIQUE (CPF),  
  UNIQUE (emailComprador)  
);


CREATE TABLE IF NOT EXISTS StatusCompra (
  idStatusCompra INT NOT NULL AUTO_INCREMENT,  
  StatusCompracol VARCHAR(45),  
  PRIMARY KEY (idStatusCompra), 
  UNIQUE (StatusCompracol)  
);


CREATE TABLE IF NOT EXISTS VendaCompra (
  idVendaCompra INT NOT NULL AUTO_INCREMENT,  
  userComprador_idComprador INT NOT NULL,  
  dataHora TIMESTAMP, 
  nota_fiscal VARCHAR(250) , 
  valorTotal FLOAT , 
  StatusCompra_idStatusCompra INT NOT NULL,  
  PRIMARY KEY (idVendaCompra),  
  FOREIGN KEY (userComprador_idComprador) REFERENCES userComprador(idComprador),  
  FOREIGN KEY (StatusCompra_idStatusCompra) REFERENCES StatusCompra(idStatusCompra)  
);


CREATE TABLE IF NOT EXISTS Categoria (
  idCategoria INT NOT NULL AUTO_INCREMENT,  
  nomeCategoria VARCHAR(45),  
  PRIMARY KEY (idCategoria),  
  UNIQUE (nomeCategoria) 
);


CREATE TABLE IF NOT EXISTS Subcategoria (
  idSubcategoria INT NOT NULL AUTO_INCREMENT,  
  nomeSubcategoria VARCHAR(45) , 
  Categoria_idCategoria INT NOT NULL,  
  PRIMARY KEY (idSubcategoria),  
  UNIQUE (nomeSubcategoria),
  FOREIGN KEY (Categoria_idCategoria) REFERENCES Categoria(idCategoria)  
);

CREATE TABLE IF NOT EXISTS Produto (
  idProduto INT NOT NULL AUTO_INCREMENT, 
  statusProduto VARCHAR(20),
  anoProduto INT ,
  precoProduto FLOAT ,
  imagemProduto LONGBLOB ,
  descricaoProduto MEDIUMTEXT ,
  categoria VARCHAR(20) ,
  condicaoProduto VARCHAR(10),
  PRIMARY KEY (idProduto)
);

CREATE TABLE IF NOT EXISTS ItensVendaCompra ( 
  VendaCompra_idVendaCompra INT NOT NULL,
  Produto_idProduto INT NOT NULL, 
  qtdeItens INT ,
  PRIMARY KEY (VendaCompra_idVendaCompra, Produto_idProduto),
  FOREIGN KEY (VendaCompra_idVendaCompra) REFERENCES VendaCompra(idVendaCompra),
  FOREIGN KEY (Produto_idProduto) REFERENCES Produto(idProduto) 
);

-- Restaurar as configurações anteriores
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;


