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


function pesquisar ($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM Vendedor WHERE ";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . "nomeVendedor LIKE '$pesq%' ";
                break;
        case 2: // Por CNPJ
                $sql = $sql . "CNPJ_CPF = '$pesq' ";
                break;
        case 3: // Por ID
            $sql = $sql . "idVendedor = '$pesq' ";
                break;
        case 4: // Por Email
            $sql = $sql . "emailVendedor = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarVendedorPorNome ($pesq) {
    return pesquisar($pesq,1);
}

function pesquisarVendedorPorCNPJ_CPF ($pesq) {
    return pesquisar($pesq,2);
}

function pesquisarVendedorPorID ($pesq) {
    return pesquisar($pesq,3);
}


function pesquisarVendedorPorEmail ($pesq) {
    return pesquisar($pesq,4);
}







function alterarVendedor($id, $nome, $email, $telefone, $dtNasc, $arquivo, $descricao) {
    $conexao = conectarBD();   
    
    // Parte condicional para tratar a imagem
    if ($arquivo) {
        $tamanhoImg = $arquivo["size"]; 
        $arqAberto = fopen($arquivo["tmp_name"], "r");
        $arquivo = addslashes(fread($arqAberto, $tamanhoImg));
        
        // Se o arquivo for enviado, atualiza o campo da imagem
        $sql = "UPDATE Vendedor SET "
        . "nomeVendedor = '$nome', "
        . "descricaoVendedor = '$descricao', "
        . "emailVendedor = '$email', "
        . "telefoneVendedor = '$telefone', "
        . "imgVendedor = '$arquivo', "
        . "data_nascimentoVendedor = '$dtNasc' "
        . "WHERE idVendedor = $id";
    } else {
        // Se o arquivo não for enviado, não atualiza o campo da imagem
        $sql = "UPDATE Vendedor SET "
        . "nomeVendedor = '$nome', "
        . "descricaoVendedor = '$descricao', "
        . "emailVendedor = '$email', "
        . "telefoneVendedor = '$telefone', "
        . "data_nascimentoVendedor = '$dtNasc' "
        . "WHERE idVendedor = $id";
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));     
    return $id;
}


function alterarSenha($id, $senha1){
    $conexao = conectarBD();

    $sql = "UPDATE Vendedor SET "
    . "senhaVendedor = '$senha1' "
    . "WHERE idVendedor = $id";
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    return $id;
}


function excluirVendedor () {

}

function verificarLogin($email, $senha) {
    $sql = "SELECT * FROM Vendedor WHERE emailVendedor = '$email' and senhaVendedor = '$senha'";

    $conexao = conectarBD();  
    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

    if (  $registro = mysqli_fetch_assoc($res)  ) {
        return $registro;        
    } else {
        return null;
    }

}



?>
