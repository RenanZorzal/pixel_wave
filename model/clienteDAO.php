<?php

require "conexaoBD.php";    
static $conexao;

function inserirCliente ($nome, $cpf, $email, $telefone, $dtNasc, $sexo, $senha) {

    $conexao = conectarBD();    

    // Converter data. Se necessário
    $dataConvertida = converterData($dtNasc);
    
    // Montar SQL
    $sql = "INSERT INTO Cliente 
        (nome, cpf, email, telefone, dtNasc, sexo, senha)
        VALUES ('$nome' , '$cpf', '$email','$telefone','$dataConvertida','$sexo','$senha')";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}

function atualizarCliente () {

}

function excluirCliente () {

}

function pesquisarClientePorNome () {

}

function getCliente () {

}