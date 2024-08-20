<?php

require "conexaoBD.php";    
static $conexao;

function inserirVendedor ($nome, $cpf, $email, $telefone, $dtNasc, $sexo, $senha, $status, $descricao, $arquivo) {

    $conexao = conectarBD();    

    // Converter data. Se necessário
    $dataConvertida = converterData($dtNasc);

    // Transformar a imagem
    $tamanhoImg = $arquivo["size"]; 
    $arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    $foto = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    // Montar SQL
    $sql = "INSERT INTO Vendedor 
        (nome, cpf, email, telefone, dtNasc, sexo, senha, status, descricao, foto)
        VALUES ('$nome' , '$cpf', '$email','$telefone','$dataConvertida','$sexo','$senha','$status','$descricao','$foto')";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}

function atualizarVendedor () {

}

function excluirVendedor () {

}

function pesquisarVendedorPorNome () {

}

function getVendedor () {

}