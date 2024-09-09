<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirProduto($vendedor, $nome, $status, $ano, $preco, $arquivo, $descricao, $subcategoria, $condicao, $qtdestoque) {

    $conexao = conectarBD();    

    $tamanhoImg = $arquivo["size"]; 
    $arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    $arquivo = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    
    // Montar SQL
    $sql = "INSERT INTO Produto(Vendedor_idVendedor, nomeProduto, statusProduto, anoProduto, precoProduto, imagemProduto, descricaoProduto, Subcategoria_idSubcategoria,
     condicaoProduto, qtdEstoque) VALUES
      ('$vendedor', '$nome', '$status', '$ano', '$preco', '$arquivo', '$descricao', '$subcategoria', '$condicao', '$qtdestoque')
;

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}


function pesquisar ($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM Produto WHERE ";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . "nomeProduto LIKE '$pesq%' ";
                break;
        case 2: // Por tipo
                $sql = $sql . "Subcategoria_idSubcategoria = '$pesq' ";
                break;
        case 3: // Por ID
            $sql = $sql . "idProduto = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisaProdutoPorNome ($pesq) {
    return pesquisar($pesq,1);
}

function pesquisarProdutoPorCategoria ($pesq) {
    return pesquisar($pesq,2);
}

function pesquisarProdutoPorID ($pesq) {
    return pesquisar($pesq,3);
}


function atualizarProduto() {

}

function excluirProduto() {

}

?>
