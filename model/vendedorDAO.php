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

function atualizarVendedor ($tipo, $id, $nomeAlterado, $emailAlterado, $telefoneAlterado, $dtNascAlterada, $cpfcnpjAlterado, $imgAlterada, $senhaAlterada, $descricaoAlterada, $celularAlterado, $razaoAlterado, $inscricaoAlterado) {
    
    $conexao = conectarBD(); 
    
    $sql = "UPDATE vendedor SET ";
    switch ($tipo) {
        case 1: // Alterar nome
                $sql = $sql . " nomeVendedor = '$nomeAlterado' WHERE idVendedor = $id";
                break;
        case 2: // Alterar email
                $sql = $sql . " emailVendedor = '$emailAlterado' WHERE idVendedor = $id";
                break;
        case 3: // Alterar telefone
                $sql = $sql . " telefoneVendedor = $telefoneAlterado WHERE idVendedor = $id";
                break;
        case 4: // Alterar data de nascimento
                $sql = $sql . " data_nascimentoVendedor = '$dtNascAlterada' WHERE idVendedor = $id";
                break;
        case 5: // Alterar cpf cnpj
                $sql = $sql . " CPF_CNPJ = '$cpfcnpjAlterado' WHERE idVendedor = $id";
                break;
        case 6: // Alterar imagem
                $sql = $sql . " imgVendedor = $imgAlterada WHERE idVendedor = $id";
                break;
        case 7: // Alterar senha
                $sql = $sql ." senhaVendedor = '$senhaAlterada' WHERE idVendedor = $id";
                break;         
        case 8: // Alterar descrição
                $sql = $sql ." descricaoVendedor = '$descricaoAlterada' WHERE idVendedor = $id";
                break;
        case 9: // Alterar celular
               $sql = $sql ." celularVendedor = $celularAlterado WHERE idVendedor = $id";
               break;
        case 10: // Alterar razão social
               $sql = $sql ." razaoSocial = '$razaoAlterado' WHERE idVendedor = $id";
               break;
        case 11: // Alterar inscricaoEstadual
               $sql = $sql ." inscricaoEstadual = $inscricaoAlterado WHERE idVendedor = $id";                
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;

}

function excluirVendedor () {

}


?>
