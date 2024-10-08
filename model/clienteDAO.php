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
                break;
        case 4: // Por email
                $sql = $sql . "emailComprador = '$pesq' ";
            
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

function pesquisarCompradorPorEmail ($pesq) {
    return pesquisar($pesq,4);
}







function alterarCliente($id, $nome, $email, $telefone, $dtNasc, $arquivo = null) {
    $conexao = conectarBD();

    // Se um novo arquivo foi enviado, converte a imagem
    if ($arquivo) {
        $tamanhoImg = $arquivo["size"];
        $arqAberto = fopen($arquivo["tmp_name"], "r");
        $arquivo = addslashes(fread($arqAberto, $tamanhoImg));

        // Montar SQL com a imagem
        $sql = "UPDATE Comprador SET 
                nomeComprador = '$nome', 
                emailComprador = '$email', 
                telefoneComprador = '$telefone', 
                data_nascimentoComprador = '$dtNasc', 
                imgComprador = '$arquivo'
                WHERE idComprador = $id";
    } else {
        // Montar SQL sem a imagem
        $sql = "UPDATE Comprador SET 
                nomeComprador = '$nome', 
                emailComprador = '$email', 
                telefoneComprador = '$telefone', 
                data_nascimentoComprador = '$dtNasc'
                WHERE idComprador = $id";
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao)); // Executa a query
    
    return $id;
}


function alterarSenha($id, $senha1){
    $conexao = conectarBD();

    $sql = "UPDATE Comprador SET "
    . "senhaComprador = '$senha1' "
    . "WHERE idComprador = $id";
    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    return $id;
}

function verificarLogin($email, $senha) {
    $sql = "SELECT * FROM Comprador WHERE emailComprador = '$email' and senhaComprador = '$senha'";

    $conexao = conectarBD();  
    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

    if (  $registro = mysqli_fetch_assoc($res)  ) {
        return $registro;        
    } else {
        return null;
    }

}

function excluirCliente () {

}


?>
