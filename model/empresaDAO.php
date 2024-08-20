<?php

require "conexaoBD.php";    
static $conexao;

function inserirEmpresa ($nome, $cnpj, $email, $telefone, $dtAbertura, $senha, $stts, $descricao, $rzSocial, $arquivo) {

    $conexao = conectarBD();    

    // Converter data. Se necessário
    $dataConvertida = converterData($dtAbertura);
    
    // Transformar a imagem
    $tamanhoImg = $arquivo["size"]; 
    $arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    $logo = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    // Montar SQL
    $sql = "INSERT INTO Empresa 
        (nome, cnpj, email, telefone, dtAbertura, senha, stts, descricao, rzSocial, logo)
        VALUES ('$nome' , '$cnpj', '$email','$telefone','$dataConvertida','$senha','$stts','$descricao','$rzSocial','$logo')";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}

function atualizarEmpresa () {

}

function excluirEmpresa () {

}

function pesquisarEmpresaPorNome () {

}

function getEmpresa () {

}