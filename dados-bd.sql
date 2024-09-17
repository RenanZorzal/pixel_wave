
USE TCC24IFES;

INSERT INTO categoria(nomeCategoria) VALUES
('dispositivos_móveis'),
('desktop'),
('notebook');

INSERT INTO subcategoria(nomeSubcategoria, Categoria_idCategoria) VALUES
('Placa de rede dispositivos móveis', 1),
('Placa de vídeo dispositivos móveis', 1),
('Memória dispositivos móveis', 1),
('CPU dispositivos móveis', 1),
('Celulares dispositivos móveis', 1),
('Tablets dispositivos móveis', 1),
('Periféricos dispositivos móveis', 1),
('Acessórios dispositivos móveis', 1),
('Placa de rede desktop', 2),
('Placa de vídeo desktop', 2),
('Memória desktop', 2),
('CPU desktop', 2),
('Gabinete desktop', 2),
('Armazenamento desktop', 2),
('Periféricos desktop', 2),
('Acessórios desktop', 2),
('Fonte desktop', 2),
('Placa de rede notebook', 3),
('Placa de vídeo notebook', 3),
('Memória notebook', 3),
('CPU notebook', 3),
('Gabinete notebook', 3),
('Armazenamento', 3),
('Periféricos notebook', 3),
('Acessórios notebook', 3),
('Bateria', 3);

INSERT INTO statuscompra(StatusCompra) VALUES 
('Andamento'),
('Realizada'),
('Cancelada'),
('A pagar'),
('A caminho'),
('Reembolso')
;
INSERT INTO vendedor (nomeVendedor, descricaoVendedor, emailVendedor, telefoneVendedor, celularVendedor, tipoVendedor, CNPJ_CPF, imgVendedor, razaoSocial, senhaVendedor, data_nascimentoVendedor, inscricaoEstadual) VALUES
('Jão', NULL, 'jaobonito123456@gmail.com', '11111111111', '22222222222', 'Pessoa física', '111.111.222-23', NULL, NULL, '123456789', '2000-01-01','1212121212'),
('LTDA Vendas Peças', NULL, 'empresavendaspecas@gmail.com', '11111111121', '22222222223', 'Pessoa jurídica', '111.111.222-24', NULL, NULL, '123456789', '2020-01-21', '3434343434');

INSERT INTO comprador (nomeComprador, emailComprador, telefoneComprador, data_nascimentoComprador, CPF, imgComprador, senhaComprador) VALUES 
('Jãozin', 'jaobonitininho123456@gmail.com', '2211111111', '2000-01-01', '111.222.333-44', null, '123456789');

INSERT INTO produto(Vendedor_idVendedor, nomeProduto, statusProduto, anoProduto, precoProduto, imagemProduto, descricaoProduto, Subcategoria_idSubcategoria, condicaoProduto, qtdEstoque) VALUES
(1, 'Motorola', 'disponível', 2020, 2691.99 , null, 'Smartphone motorola', 5, 'seminova', 1),
(2, 'Placa de vídeo', 'disponível', 2020, 5999.99 , null, 'Placa de vídeo para computadores', 10, 'nova', 700),
(2, 'CPU Notebook', 'disponível', 2020, 23.99 , null, 'CPU para mini notebook', 20, 'nova', 43);

#select * from nometabela; # mostrar dados da tabela
#delete from nometabela where id = 79(condição desejada); # deleta uma linha afunilada pela condição
#update nometabela set coluna = 'informação nova' where id =9233; # muda os dados de uma linha afunilada pela condição
