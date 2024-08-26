<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirVendedor ($tipo, $nome, $email, $cpf, $data_nasc, $telefone, $senha) {

    $conexao = conectarBD();    

    // Montar SQL
    $sql = "INSERT INTO Vendedor 
        (nomeVendedor, descricaoVendedor, emailVendedor, telefoneVendedor, celularVendedor, tipoVendedor, CNPJ_CPF, imgVendedor, razaoSocial, senhaVendedor, data_nascimentoVendedor, inscricaoEstadual)
        VALUES ('$nome', null, '$email', '$telefone', null, '$tipo', '$cpf', null, null, '$senha', '$data_nasc', null)";

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

//códigos se necessário

//$dataConvertida = converterData($data_nasc);


?>