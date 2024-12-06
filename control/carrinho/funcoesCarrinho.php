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

    require_once "../../model/produtoDAO.php";

    function alterarQtdeCarrinho($idProduto, $qtde) {
        $qtdeNova = $_SESSION["carrinho"][$idProduto]["qtde"] + $qtde;
        $resultado = pesquisarProdutoPorID($idProduto);

        if (mysqli_num_rows($resultado) > 0) {
            // Enquanto houver linhas, busca e processa os dados
            while ($row = mysqli_fetch_assoc($resultado)) {
                // Acessa os dados da linha atual:
                $qtdeEstoque = $row['qtdEstoque'];
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        if ( $qtdeNova > 0 && $qtdeNova <= $qtdeEstoque) {
            $_SESSION["carrinho"][$idProduto]["qtde"] = $qtdeNova;
        } 
    }
    
?>
