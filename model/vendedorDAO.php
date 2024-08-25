<?php

require "conexaoBD.php";    
static $conexao;

function inserirVendedor ($tipo, $nome, $email, $cpf, $data_nasc, $telefone, $senha) {

    $conexao = conectarBD();    

    // Converter data. Se necessário
    $dataConvertida = converterData($data_nasc);

    // Montar SQL
    $sql = "INSERT INTO userVendedor 
        (tipoVendedor, nomeVendedor, emailVendedor, CNPJ_CPF, dtNasc, telefoneVendedor, senhaVendedor)
        VALUES ('$tipo' ,'$nome' , '$email', '$cpf', '$dataConvertida','$telefone','$senha')";

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