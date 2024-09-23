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


function pesquisar ($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM Vendedor WHERE ";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . "nomeVendedor LIKE '%$pesq%' ";
                break;
        case 2: // Por CNPJ
                $sql = $sql . "CNPJ_CPF = '$pesq' ";
                break;
        case 3: // Por ID
                $sql = $sql . "idVendedor = '$pesq' ";
                break;
        case 4: // Por email
            $sql = $sql . "emailVendedor = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarEmpresaPorNome ($pesq) {
    return pesquisar($pesq,1);
}

function pesquisarEmpresaPorCNPJ_CPF ($pesq) {
    return pesquisar($pesq,2);
}

function pesquisarEmpresaPorID ($pesq) {
    return pesquisar($pesq,3);
}

function pesquisarEmpresaPorEmail($pesq) {
    return pesquisar($pesq,4);
}






function alterarEmpresa ($id, $nome,$email, $telefone, $celular, $arquivo, $razao, $dataAbertura, $inscricaoEstadual, $descricao) {

    $conexao = conectarBD();   
    
    // Converter data. Se necessário
    if ($arquivo) {
        $tamanhoImg = $arquivo["size"]; 
        $arqAberto = fopen($arquivo["tmp_name"], "r");
        $arquivo = addslashes(fread($arqAberto, $tamanhoImg));

 
    // Montar SQL
    $sql = "UPDATE Vendedor SET "
    . "nomeVendedor = '$nome', "
    . "descricaoVendedor = '$descricao', "
    . "emailVendedor = '$email', "
    . "telefoneVendedor = '$telefone', "
    . "celularVendedor = '$celular', "
    . "imgVendedor = '$arquivo', "
    . "razaoSocial = '$razao', "
    . "data_nascimentoVendedor = '$dataAbertura', "
    . "inscricaoEstadual = '$inscricaoEstadual'"
    . "WHERE idVendedor = $id";

  
}else{
    $sql = "UPDATE Vendedor SET "
    . "nomeVendedor = '$nome', "
    . "descricaoVendedor = '$descricao', "
    . "emailVendedor = '$email', "
    . "telefoneVendedor = '$telefone', "
    . "celularVendedor = '$celular', "
    . "razaoSocial = '$razao', "
    . "data_nascimentoVendedor = '$dataAbertura', "
    . "inscricaoEstadual = '$inscricaoEstadual'"
    . "WHERE idVendedor = $id";
}
mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
return $id;
}
function excluirEmpresa () {

}

    ?>
