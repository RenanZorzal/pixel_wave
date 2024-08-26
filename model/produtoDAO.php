<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirProduto($status, $ano, $preco, $arquivo, $descricao, $categoria, $condicao) {

    $conexao = conectarBD();    

    $tamanhoImg = $arquivo["size"]; 
    $arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    $arquivo = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    
    // Montar SQL
    $sql = "INSERT INTO produto 
        (statusProduto, anoProduto, precoProduto, imagemProduto, descricaoProduto, categoria, condicaoProduto)
        VALUES ('$status', $ano, $preco, '$arquivo', '$descricao', '$categoria', '$condicao')";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}

function atualizarProduto() {

}

function excluirProduto() {

}

function pesquisarProdutoPorNome() {

}

function getProduto() {

}
?>