<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirEmpresa ($tipo, $nome, $email, $cnpj, $data_abertura, $telefone, $celular, $razaoSocial, $inscricaoEstadual, $senha) {

    $conexao = conectarBD();   

    // Montar SQL
    $sql = "INSERT INTO Vendedor 
        (nomeVendedor, descricaoVendedor, emailVendedor, telefoneVendedor, celularVendedor, tipoVendedor, CNPJ_CPF, imgVendedor, razaoSocial, senhaVendedor, data_nascimentoVendedor, inscricaoEstadual)
        VALUES ('$nome', null, '$email', '$telefone', '$celular', '$tipo', '$cnpj', null, '$razaoSocial', '$senha', '$data_abertura', '$inscricaoEstadual')";

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

//CODIGOS TALVEZ NECESSÁRIOS

    // Transformar a imagem
    //$tamanhoImg = $arquivo["size"]; 
    //$arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    //$logo = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    ?>