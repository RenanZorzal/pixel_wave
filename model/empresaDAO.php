<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirEmpresa ($tipo, $nome, $email, $cnpj, $data_abertura, $telefone, $celular, $razaoSocial, $inscricaoEstadual, $senha) {

    $conexao = conectarBD();   

    // Montar SQL
    $sql = "INSERT INTO userVendedor 
        (tipoVendedor, nomeVendedor, emailVendedor, CNPJ_CPF, dataVendedor, telefoneVendedor, celularVendedor, razaoSocial, inscricaoEstadual, senhaVendedor, imgVendedor)
        VALUES ('$tipo', '$nome', '$email', '$cnpj', '$data_abertura', '$telefone', '$celular', '$razaoSocial', '$inscricaoEstadual', '$senha', null)";

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