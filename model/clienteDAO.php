<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirCliente ($nome, $email, $telefone, $dtNasc, $cpf, $senhaComprador) {

    $conexao = conectarBD();        
    
    // Montar SQL
    $sql = "INSERT INTO Comprador
        ()
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
?>