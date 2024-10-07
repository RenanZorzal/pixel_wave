USE TCC24IFES;

INSERT INTO Categoria(nomeCategoria) VALUES
('Dispositivos_móveis'),
('Desktop'),
('Notebook');

INSERT INTO Subcategoria(nomeSubcategoria, Categoria_idCategoria) VALUES
('Placa de rede', 1),
('Placa de vídeo', 1),
('Memória', 1),
('CPU', 1),
('Celulares', 1),
('Tablets', 1),
('Periféricos', 1),
('Acessórios', 1),
('Placa de rede', 2),
('Placa de vídeo', 2),
('Memória', 2),
('CPU', 2),
('Gabinete', 2),
('Armazenamento', 2),
('Periféricos', 2),
('Acessórios', 2),
('Fonte', 2),
('Placa de rede ', 3),
('Placa de vídeo ', 3),
('Memória ', 3),
('CPU ', 3),
('Gabinete ', 3),
('Armazenamento ', 3),
('Periféricos ', 3),
('Acessórios ', 3),
('Bateria ', 3);

INSERT INTO StatusCompra(StatusCompra) VALUES 
('Andamento'),
('Realizada'),
('Cancelada'),
('A pagar'),
('A caminho'),
('Reembolso')
;
INSERT INTO Vendedor (nomeVendedor, descricaoVendedor, emailVendedor, telefoneVendedor, celularVendedor, tipoVendedor, CNPJ_CPF, imgVendedor, razaoSocial, senhaVendedor, data_nascimentoVendedor, inscricaoEstadual) VALUES
('Jão', 'Vendo peças usadas pelo meu filho', 'jaobonito123456@gmail.com', '11111111111', '22222222222', 'Pessoa física', '111.111.222-23', NULL, NULL, '123456789', '2000-01-01','1212121212'),
('Maria', 'Venedo peças utilizadas', 'maria.vendedora@gmail.com', '11111111112', '22222222221', 'Pessoa física', '111.111.222-21', NULL, NULL, '123456789', '2000-01-07','1212161212'),
('Joana Marina', 'Quero vender pra ganhar dinheiro', 'joaninha1988@gmail.com', '11111111212', '22222222121', 'Pessoa física', '111.111.212-21', NULL, NULL, '123456789', '2000-08-07','1212166212'),
('Augusto Mario Matheus', 'Prucuro vender minhas peças usadas que estão em bom estado', 'Augusto_M&M_@hotmail.com', '12111111112', '21222222221', 'Pessoa física', '111.121.222-21', NULL, NULL, '123456789', '1998-01-07','1212162212'),
('Marcia Célia', 'Vender :)', 'celiamarcia672@gmail.com', '11811111323', '22122522323', 'Pessoa física', '911.111.214-24', NULL, NULL, '123456789', '2014-06-30', '8454383434'),
('LTDA Vendas Peças', 'Loja física agora virtual', 'empresavendaspecas@gmail.com', '11111111121', '22222222223', 'Pessoa jurídica', '111.111.222-24', NULL, NULL, '123456789', '2020-01-21', '3434343434'),
('Empresa Informática', 'Empresa com 10 anos no ramo', 'empresainformatica@gmail.com', '11111111123', '22122222223', 'Pessoa jurídica', '111.111.212-24', NULL, NULL, '123456789', '2020-06-21', '8434343434'),
('InforTec', 'Vendemos as melhores peças pelo melhor preço', 'InforTec@gmail.com', '11111111323', '22122222323', 'Pessoa jurídica', '111.111.214-24', NULL, NULL, '123456789', '2012-06-21', '8434383434'),
('PixelWave', 'O melhor site de venda de peças de informática', 'melhorempresadomundo@gmail.com', '11111911123', '21122222223', 'Pessoa jurídica', '111.411.212-24', NULL, NULL, '123456789', '2020-02-21', '8634343434'),
('MiraclePeças', 'Fazemos milagres por você!', 'miraclepecas34@hotmail.com', '11111711212', '22224222121', 'Pessoa jurídica', '811.111.212-21', NULL, NULL, '123456789', '2000-12-07','1292166212');

INSERT INTO Comprador (nomeComprador, emailComprador, telefoneComprador, data_nascimentoComprador, CPF, imgComprador, senhaComprador) VALUES 
('Jão', 'jaobonitininho123456@gmail.com', '2211111111', '2000-01-01', '111.222.333-44', null, '123456789'),
('Joana Marina', 'joaninha1988@gmail.com', '11111111212', '1988-08-07', '111.111.212-21', NULL, '123456789'),
('Andre Marcos', 'ursinhoandre42@gmail.com', '2218111111', '2000-05-01', '111.226.333-44', null, '123456789'),
('Margarete Alicia', 'paracomprinhasonline@gmail.com', '2211111161', '1979-01-01', '111.222.353-44', null, '123456789');

INSERT INTO Produto(Vendedor_idVendedor, nomeProduto, statusProduto, anoProduto, precoProduto, imagemProduto, descricaoProduto, Subcategoria_idSubcategoria, condicaoProduto, qtdEstoque) VALUES
(1, 'Placa de rede', 'disponível', 2020, 2691.99 , null, 'Descrição Placa de rede', 1, 'seminova', 1),
(2, 'Placa de vídeo', 'disponível', 2020, 2691.99 , null, 'Descrição placa de vídeo', 2, 'seminova', 1),
(3, 'Memória', 'disponível', 2020, 2691.99 , null, 'Descrição memória', 3, 'seminova', 1),
(4, 'CPU', 'disponível', 2020, 2691.99 , null, 'Descrição CPU', 4, 'seminova', 1),
(1, 'Motorola', 'disponível', 2020, 2691.99 , null, 'Smartphone motorola', 5, 'seminova', 1),
(5, 'Tablets', 'disponível', 2020, 2691.99 , null, 'Descrição tablets', 6, 'seminova', 1),
(1, 'Periféricos', 'disponível', 2020, 2691.99 , null, 'Descrição Periféricos', 7, 'seminova', 1),
(4, 'Acessórios', 'disponível', 2020, 2691.99 , null, 'Descrição Acessórios', 8, 'seminova', 1),
(5, 'Placa de rede', 'disponível', 2020, 2691.99 , null, 'Descrição Placa de rede', 9, 'seminova', 1),
(2, 'Placa de vídeo', 'disponível', 2020, 5999.99 , null, 'Placa de vídeo para computadores', 10, 'seminova', 700),
(7, 'Memória', 'disponível', 2020, 23.99 , null, 'Descrição Memória', 11, 'nova', 43),
(8, 'CPU', 'disponível', 2020, 5999.99 , null, 'Descrição CPU', 12, 'nova', 700),
(9, 'Gabinete', 'disponível', 2020, 23.99 , null, 'Descrição Gabinete', 13, 'nova', 43),
(7, 'Armazenamento', 'disponível', 2020, 5999.99 , null, 'Descrição Armazenamento', 14, 'nova', 700),
(8, 'Periféricos', 'disponível', 2020, 23.99 , null, 'Descrição Periféricos', 15, 'nova', 43),
(9, 'Acessórios', 'disponível', 2020, 5999.99 , null, 'Descrição Acessórios', 16, 'nova', 700),
(10, 'Fonte', 'disponível', 2020, 23.99 , null, 'Descrição Fonte', 17, 'nova', 43),
(7, 'Placa de rede ', 'disponível', 2020, 5999.99 , null, 'Descrição Placa de rede ', 18, 'nova', 700),
(8, 'Placa de vídeo ', 'disponível', 2020, 23.99 , null, 'Descrição Placa de vídeo ', 19, 'nova', 43),
(2, 'CPU ', 'disponível', 2020, 23.99 , null, 'CPU para mini ', 20, 'seminova', 43),
(6, 'CPU ', 'disponível', 2020, 23.99 , null, 'Descrição CPU ', 21, 'nova', 43),
(10, 'Gabinete ', 'disponível', 2020, 5999.99 , null, 'Descrição Gabinete ', 22, 'nova', 700),
(3, 'Armazenamento ', 'disponível', 2020, 2691.99 , null, 'Descrição Armazenamento ', 23, 'seminova', 1),
(6, 'Periféricos ', 'disponível', 2020, 5999.99 , null, 'Descrição Periféricos ', 24, 'nova', 700);



#select * from nometabela; # mostrar dados da tabela
#delete from nometabela where id = 79(condição desejada); # deleta uma linha afunilada pela condição
#update nometabela set coluna = 'informação nova' where id =9233; # muda os dados de uma linha afunilada pela condição
#select produto.nomeProduto, subcategoria.idSubcategoria from produto join subcategoria on produto.Subcategoria_idSubcategoria = subcategoria.idSubcategoria and nomeSubcategoria = 'Celulares';
