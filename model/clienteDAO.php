<?php

require "conexaoBD.php";    
static $conexao;

function inserirCliente ($nome, $email, $telefone, $dtNasc, $cpf, $senhaComprador) {

    $conexao = conectarBD();    

    // Converter data. Se necessário
    
    
    // Montar SQL
    $sql = "INSERT INTO comprador 
        (nomeComprador, emailComprador, telefoneComprador, data_nascimentoComprador, CPF, senhaComprador)
        VALUES ('$nome', '$email', '$telefone', '$dtNasc', '$cpf', '$senhaComprador')";

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