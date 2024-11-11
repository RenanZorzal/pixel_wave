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
?>

