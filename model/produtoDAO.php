<?php

require "a.conexaoBD.php";    
static $conexao;

function inserirProduto($vendedor, $nome, $status, $ano, $preco, $arquivo, $descricao, $categoria, $condicao, $qtdestoque) {

    $conexao = conectarBD();    

    $tamanhoImg = $arquivo["size"]; 
    $arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    $arquivo = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    
    // Montar SQL
    $sql = "INSERT INTO Produto(Vendedor_idVendedor, nomeProduto, statusProduto, anoProduto, precoProduto, imagemProduto, descricaoProduto, Subcategoria_idSubcategoria,
     condicaoProduto, qtdEstoque) VALUES
      ($vendedor, '$nome', '$status', '$ano', '$preco', '$arquivo', '$descricao', $categoria, '$condicao', '$qtdestoque')";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    // Pega o código inserido
    $id = mysqli_insert_id($conexao);  
    return $id;
}


function pesquisar($pesq, $tipo) {

    $conexao = conectarBD(); 

    $sql = "SELECT * FROM Produto WHERE";
    switch ($tipo) {
        case 1: // Por nome
                $sql = $sql . " nomeProduto LIKE '%$pesq%' ";
                break;
        case 2: // Por tipo
                $sql = $sql . " Subcategoria_idSubcategoria = '$pesq' ";
                break;
        case 3: // Por ID
                $sql = $sql . " idProduto = '$pesq' ";
                break;
        case 4: // Por ID Vendedor
            $sql = $sql . " Vendedor_idVendedor = '$pesq' ";
    }

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisarProdutoEmIdVendedor ($vendedor, $pesq) {
    $conexao = conectarBD();  
    $sql = "SELECT * from Produto WHERE Vendedor_idVendedor = $vendedor AND nomeProduto LIKE '%$pesq%'";

    $res = mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );
    return $res;
}

function pesquisaProdutoPorNome ($pesq) {
    return pesquisar($pesq, 1);
}

function pesquisarProdutoPorCategoria ($pesq) {
    return pesquisar($pesq, 2);
}

function pesquisarProdutoPorID ($pesq) {
    return pesquisar($pesq, 3);
}

function pesquisarProdutoPorIdVendedor ($pesq) {
    return pesquisar($pesq, 4);
}

function alterarProduto ($id, $nome, $status, $ano, $preco, $arquivo, $descricao, $subcategoria, $condicao, $qtdEstoque) {
    
    $conexao = conectarBD();   
    
    // Converter data. Se necessário
    

    // Transformar a imagem
    $tamanhoImg = $arquivo["size"]; 
    $arqAberto = fopen ( $arquivo["tmp_name"], "r" );
    $arquivo = addslashes( fread ( $arqAberto , $tamanhoImg ) );

    // Montar SQL
    $sql = "UPDATE Produto SET "
    . "nomeProduto = '$nome', "
    . "statusProduto = '$status', "
    . "anoProduto = '$ano', "
    . "precoProduto = '$preco', "
    . "descricaoProduto = '$descricao', "
    . "Subcategoria_idSubcategoria = '$subcategoria', "
    . "condicaoProduto = '$condicao', "
    . "qtdEstoque = '$qtdEstoque', "
    . "imagemProduto = '$arquivo' "
    . "WHERE idProduto = $id";

    mysqli_query($conexao, $sql) or die ( mysqli_error($conexao) );     // Inserir no banco
    
    return $id;
}

function nomeVendedor($id){
    $conexao = conectarBD();
    $sql = "SELECT nomeVendedor FROM Vendedor WHERE idVendedor = $id";
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    if ($row = mysqli_fetch_assoc($res)) {
        return $row['nomeVendedor'];
    } else {
        return null; // Retorna null se não encontrar o vendedor
    }
}
function verificarAutonomo($id) {
    $sql = "SELECT * FROM Vendedor WHERE idVendedor = '$id' AND tipoVendedor = 'Pessoa física'";

    $conexao = conectarBD();  
    $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    if (mysqli_num_rows($res) > 0) {
        return 1; // O email já existe para outro usuário
    } else {
        return 0; // O email não existe ou pertence ao usuário atual
    }
}

function excluirProduto() {

}

?>
