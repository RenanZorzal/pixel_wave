<?php

if ( isset($_POST["id"])  ) {
    $id = $_POST["id"];

    require_once '../../model/produtoDAO.php';              
    
    $resultado = pesquisarProdutoPorIdVendedor($id);
    
    //Se houver alguma resposta de produtos com aquele nome
    if ( mysqli_num_rows($resultado) > 0) {

        // Cria um array para armazenar todos os resultados
        $registros = array(
            "erro" => "",
            "produtos" => array()  
        );

        // Percorre todos os resultados e os adiciona ao array
        while ( $row = mysqli_fetch_assoc($resultado) ) {
            $idProduto = $row["idProduto"];
            $idVendedor = $row["Vendedor_idVendedor"];
            $nome = $row["nomeProduto"];
            $status = $row["statusProduto"];
            $anoLancamento = $row["anoProduto"];
            $preco = $row["precoProduto"];
            $precoSemDesconto = ($preco + 200);
            $imagem = $row["imagemProduto"];
            $imageBase64 = base64_encode($imagem);      // Converter a imagem em binário para Base64
            $descricao = $row["descricaoProduto"];
            $subcategoria = $row["Subcategoria_idSubcategoria"];
            $condicao = $row["condicaoProduto"];
            $estoque = $row["qtdEstoque"];

            $registros["produtos"][] = array(
                    "idProduto" => $idProduto,
                    "idVendedor" => $idVendedor,
                    "nomeProduto" => $nome,
                    "statusProdudo" => $status,
                    "ano" => $anoLancamento,
                    "preco" => $preco,
                    "precoSemDesconto" => $precoSemDesconto,
                    "imagem" => $imageBase64,
                    "descricao" => $descricao,
                    "subcategoria" => $subcategoria,
                    "condicao" => $condicao,
                    "estoque" => $estoque
                    );

        }

        // Envia os dados como JSON (uma lista de produtos)
        header('Content-Type: application/json');
        echo json_encode($registros);
    } else {
        // Produto não encontrado
        header('Content-Type: application/json');
        echo json_encode(['erro' => 'Produto não encontrado.']);
    }
        
    
} else {
    header('Content-Type: application/json');
    echo json_encode(['erro' => 'ERRO ao pesquisar produtos.']);
}

