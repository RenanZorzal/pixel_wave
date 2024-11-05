<?php

    require_once "conexaoBD.php";    
    static $conexao;

    function inserirVenda($idCliente ) {
        $conexao = conectarBD();  

        $sql = "INSERT INTO VendaCompra (dataHora, nota_fiscal, valorTotal, Comprador_idComprador, StatusCompra_idStatusCompra) "
                . "VALUES ( NOW(), null, 0.0, $idCliente, $idStatusCompra) #1-andamento 2-realizada 3-cancelada 4-a pagar 5-a caminho 6-reembolso";

        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        $id = mysqli_insert_id($conexao);
        return $id;
    }

    
    function inserirItemVenda($idProduto, $idVenda, $qtde){
        $conexao = conectarBD();   

        $sql = "INSERT INTO ItensVendaCompra (VendaCompra_idVendaCompra, Produto_idProduto, qtdeItens) "
                . "VALUES ( $idVenda, $idProduto, $qtde)";
        
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    }

    
    function alterarTotal ($idVenda, $total) {
        $conexao = conectarBD();  
        
        $sql = "UPDATE VendaCompra SET valorTotal = $total WHERE idVendaCompra = $idVenda";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));        
    }
?>

