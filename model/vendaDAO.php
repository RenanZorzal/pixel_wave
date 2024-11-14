<?php

    require_once "a.conexaoBD.php";    
    static $conexao;

    function inserirVenda($idCliente ) {
        $conexao = conectarBD();  

        $sql = "INSERT INTO VendaCompra (dataHora, nota_fiscal, valorTotal, Comprador_idComprador, StatusCompra_idStatusCompra) "
                . "VALUES ( NOW(), null, 0.0, $idCliente, 2 ) ";
        
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        $id = mysqli_insert_id($conexao);
        return $id;
    }


    function inserirItemVenda($idVenda, $idProduto, $qtde){
        $conexao = conectarBD();  

        $sql = "INSERT INTO ItensVendaCompra (VendaCompra_idVendaCompra, Produto_idProduto, qtdeItens) "
                . "VALUES ($idVenda, $idProduto, $qtde)";
        
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    }

    
    function alterarTotal ($idVenda, $total) {
        $conexao = conectarBD();  
        
        $sql = "UPDATE VendaCompra SET valorTotal = $total WHERE idVendaCompra = $idVenda";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));        
    }

    function atualizarEstoque($idVenda) {
        $conexao = conectarBD();
    
        // Consulta para buscar os itens da venda
        $sql = "SELECT iv.Produto_idProduto, iv.qtdeItens
                FROM ItensVendaCompra AS iv
                WHERE iv.VendaCompra_idVendaCompra = $idVenda";
    
        $resultado = mysqli_query($conexao, $sql);
    
        if (!$resultado) {
            die("Erro ao buscar itens da venda: " . mysqli_error($conexao));
        }
    
        // Atualiza o estoque para cada produto
        while ($item = mysqli_fetch_assoc($resultado)) {
            $idProduto = $item['Produto_idProduto'];
            $quantidadeComprada = $item['qtdeItens'];
    
            $sqlAtualizar = "UPDATE Produto 
                             SET qtdEstoque = qtdEstoque - $quantidadeComprada 
                             WHERE idProduto = $idProduto";
    
            if (!mysqli_query($conexao, $sqlAtualizar)) {
                die("Erro ao atualizar estoque do produto $idProduto: " . mysqli_error($conexao));
            }
        }
    
        mysqli_close($conexao);
        return true;
    }





?>

