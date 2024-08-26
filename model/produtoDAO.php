<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirProduto($vendedor, $status, $ano, $preco, $imagem, $descricao, $subcategoria, $condicao) {

    $conexao = conectarBD();    

    $tamanhoImg = $imagem["size"]; 
    $arqAberto = fopen ( $imagem["tmp_name"], "r" );
    $img = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    
    // Montar SQL
    $sql = "INSERT INTO Produto 
        (user_Vendedor_idVendedor, statusProduto, anoProduto, precoProduto, imagemProduto, descricaoProduto, Subcategoria_idSubvategoria, condicaoProduto)
        VALUES ('$vendedor', '$status', '$ano', '$preco', '$img', '$descricao', '$subcategoria', '$condicao') {
)";

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