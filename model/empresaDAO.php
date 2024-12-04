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

function verificarEmail($email) {
    $sql = "SELECT * FROM Vendedor WHERE emailVendedor = '$email'";

    $conexao = conectarBD();  
    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

    if (  mysqli_num_rows($res) > 0  ) {
        return 1;        
    } else {
        return 0;
    }

}
function verificarEmail2($id, $email) {
    $sql = "SELECT * FROM Vendedor WHERE emailVendedor = '$email' AND idVendedor != '$id'";

    $conexao = conectarBD();  
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    if (mysqli_num_rows($res) > 0) {
        return 1; // O email já existe para outro usuário
    } else {
        return 0; // O email não existe ou pertence ao usuário atual
    }
}

function verificarCNPJ($cnpj) {
    $sql = "SELECT * FROM Vendedor WHERE CNPJ_CPF = '$cpnj'";

    $conexao = conectarBD();  
    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );

    if (  mysqli_num_rows($res) > 0  ) {
        return 1;        
    } else {
        return 0;
    }

}



function buscarHistorico($id) {
    $conexao = conectarBD();
    
        $sql = "SELECT * FROM itensvendacompra AS it, produto AS p, vendacompra AS vc, vendedor AS v 
        WHERE it.Produto_idProduto = p.idProduto AND it.VendaCompra_idVendaCompra = vc.idVendaCompra 
        AND v.idVendedor = $id AND p.Vendedor_idVendedor = v.idVendedor ORDER BY vc.idVendaCompra;";
    
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return $res;
}

    ?>
