<?php

require "../../model/categoriaDAO.php";

if (isset($_POST['cat'])) {
    $categoria = $_POST['cat'];
    // Chame a função para carregar as subcategorias da categoria selecionada
    
    $resultado = pesquisarPorSubcategoria($cat);

    if ( mysqli_num_rows($resultado) > 0) {

        // Cria um array para armazenar todos os resultados
        $registros = array(
            "erro" => "",
            "subcategorias" => array()  
        );

        // Percorre todos os resultados e os adiciona ao array
        while ( $row = mysqli_fetch_assoc($resultado) ) {
            $idSubcategoria = $row['idSubcategoria'];
            $nomeSubcategoria = $row['nomeSubcategoria'];   

            $registros["subcategorias"][] = array(
                    "idSubcategoria" => $idSubcategoria,
                    "nomeSubcategoria" => $nomeSubcategoria
                    );

        }

        // Envia os dados como JSON (uma lista de produtos)
        header('Content-Type: application/json');
        echo json_encode($registros);
        
    } else {
        // Produto não encontrado
        header('Content-Type: application/json');
        echo json_encode(['erro' => 'Subcategoria não encontrado.']);
    }
        
    
} else {
    header('Content-Type: application/json');
    echo json_encode(['erro' => 'ERRO ao pesquisar subcategorias.']);
}
