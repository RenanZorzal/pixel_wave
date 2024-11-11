<?php

    function inserirCarrinho($idProduto, $nome, $preco, $qtde) {
        $novoProduto = array ( $idProduto => array (
                                                "nome" => $nome,
                                                "preco" => $preco,
                                                "qtde" => $qtde,
                                                "idProduto" => $idProduto
                                              )
                             );
        
        $_SESSION["carrinho"] = $_SESSION["carrinho"] + $novoProduto;
               
    }
    
    function removerCarrinho($idProduto){
        unset( $_SESSION["carrinho"][$idProduto] );
    }

    function alterarQtdeCarrinho($idProduto, $qtde) {
        $qtdeNova = $_SESSION["carrinho"][$idProduto]["qtde"] + $qtde;
        if ( $qtdeNova > 0 ) {
            $_SESSION["carrinho"][$idProduto]["qtde"] = $qtdeNova;
        }
    }
    
?>
