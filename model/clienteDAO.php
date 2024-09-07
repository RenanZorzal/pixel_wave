<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirCliente ($nome, $email, $telefone, $dtNasc, $cpf, $senhaComprador) {

    $conexao = conectarBD();        
    
    // Montar SQL
    $sql = "INSERT INTO Comprador
        (nomeComprador, emailComprador, telefoneComprador, data_nascimentoComprador, CPF, imgComprador, senhaComprador)
        VALUES ('$nome', '$email', '$telefone', '$dtNasc', '$cpf', null ,'$senhaComprador')";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}

function pesquisar ($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM Comprador WHERE ";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . "nomeComprador LIKE '$pesq%' ";
                break;
        case 2: // Por CPF
                $sql = $sql . "CPF = '$pesq' ";
                break;
        case 3: // Por ID
            $sql = $sql . "idComprador = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarCompradorPorNome ($pesq) {
    return pesquisar($pesq,1);
}

function pesquisarCompradorPorCPF ($pesq) {
    return pesquisar($pesq,2);
}

function pesquisarCompradorPorID ($pesq) {
    return pesquisar($pesq,3);
}







function atualizarCliente () {

}

function excluirCliente () {

}


?>