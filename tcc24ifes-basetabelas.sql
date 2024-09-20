
CREATE DATABASE IF NOT EXISTS TCC24IFES;
USE TCC24IFES;


CREATE TABLE IF NOT EXISTS Vendedor (
  idVendedor INT NOT NULL AUTO_INCREMENT,
  nomeVendedor VARCHAR(45) NOT NULL, 
  descricaoVendedor VARCHAR(45) ,  
  emailVendedor VARCHAR(45) NOT NULL,  
  telefoneVendedor VARCHAR(11) NOT NULL,
  celularVendedor VARCHAR(11),
  tipoVendedor VARCHAR(100) NOT NULL , 
  CNPJ_CPF VARCHAR(45) NOT NULL,  
  imgVendedor LONGBLOB , 
  razaoSocial VARCHAR(100) ,  
  senhaVendedor VARCHAR(45) NOT NULL,
  data_nascimentoVendedor DATE ,
  inscricaoEstadual varchar(45) ,
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
  StatusCompra VARCHAR(45),  
  PRIMARY KEY (idStatusCompra), 
  UNIQUE (StatusCompra)  
);


CREATE TABLE IF NOT EXISTS VendaCompra (
  idVendaCompra INT NOT NULL AUTO_INCREMENT,  
  dataHora TIMESTAMP, 
  nota_fiscal VARCHAR(250) , 
  valorTotal FLOAT , 
  Comprador_idComprador INT NOT NULL,
  StatusCompra_idStatusCompra INT NOT NULL,  
  PRIMARY KEY (idVendaCompra),  
  FOREIGN KEY (Comprador_idComprador ) REFERENCES Comprador(idComprador ),  
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
  Vendedor_idVendedor INT NOT NULL, 
  nomeProduto VARCHAR(100),
  statusProduto VARCHAR(100),
  anoProduto INT,
  precoProduto FLOAT,
  imagemProduto LONGBLOB ,
  descricaoProduto MEDIUMTEXT ,
  Subcategoria_idSubcategoria INT NOT NULL,
  condicaoProduto VARCHAR(100),
  qtdEstoque INT,
  PRIMARY KEY (idProduto),
  FOREIGN KEY (Vendedor_idVendedor) REFERENCES Vendedor(idVendedor),
  FOREIGN KEY (Subcategoria_idSubcategoria) REFERENCES Subcategoria(idSubcategoria) 
);

CREATE TABLE IF NOT EXISTS ItensVendaCompra ( 
  VendaCompra_idVendaCompra INT NOT NULL,
  Produto_idProduto INT NOT NULL, 
  qtdeItens INT ,
  PRIMARY KEY (VendaCompra_idVendaCompra, Produto_idProduto),
  FOREIGN KEY (VendaCompra_idVendaCompra) REFERENCES VendaCompra(idVendaCompra),
  FOREIGN KEY (Produto_idProduto) REFERENCES Produto(idProduto) 
);

