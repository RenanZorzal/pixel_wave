<?php

//Documento para pesquisa de Empresas no Banco de Dados

// Esse programa é chamado pelo JSON no front-end

if ( isset($_POST["pesq"])  ) {
    $pesq = $_POST["pesq"];

    require_once '../../../model/empresaDAO.php';              
    
    $resultado = pesquisarEmpresaPorNome($pesq);
    
    //Se houver alguma resposta de produtos com aquele nome
    if ( mysqli_num_rows($resultado) > 0) {

        // Cria um array para armazenar todos os resultados
        $registros = array(
            "erro" => "",
            "empresas" => array()  
        );

        // Percorre todos os resultados e os adiciona ao array
        while ( $row = mysqli_fetch_assoc($resultado) ) {
            $idEmpresa = $row["idVendedor"];
            $nomeEmpresa = $row["nomeVendedor"];
            $descricao = $row["descricaoVendedor"];
            $email = $row["emailVendedor"];
            $telefone = $row["telefoneVendedor"];
            $celular = $row["celularVendedor"];
            $tipo = $row["tipoVendedor"]; //se é uma empresa ou um vendedor autonomo
            $cpf_cnpj = $row["CNPJ_CPF"];
            $imagem = $row["imgVendedor"];
            $imageBase64 = base64_encode($imagem);      // Converter a imagem em binário para Base64
            $razaoSocial = $row["razaoSocial"];
            $dataNascimento = $row["data_nascimentoVendedor"];
            $inscricaoEstadual = $row["inscricaoEstadual"];

            $registros["empresas"][] = array(
                    "idEmpresa" => $idEmpresa,
                    "nomeEmpresa" => $nomeEmpresa,
                    "descricao" => $descricao,
                    "email" => $email,
                    "telefone" => $telefone,
                    "celular" => $celular,
                    "tipo" => $tipo,
                    "cpf_cnpj" => $cpf_cnpj,
                    "imagem" => $imageBase64,
                    "razaoSocial" => $razaoSocial,
                    "dataNascimento" => $dataNascimento,
                    "inscricaoEstadual" => $inscricaoEstadual
                    );

        }

        // Envia os dados como JSON (uma lista de produtos)
        header('Content-Type: application/json');
        echo json_encode($registros);
    } else {
        // Produto não encontrado
        header('Content-Type: application/json');
        echo json_encode(['erro' => 'Vendedor não encontrado.']);
    }
        
   
} else {
    header('Content-Type: application/json');
    echo json_encode(['erro' => 'ERRO ao pesquisar empresas.']);
}
?>