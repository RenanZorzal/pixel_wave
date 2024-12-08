<?php

    require "funcoes-vendedor.php";
    
    // Receber os campos

    //POST
    $tipo = "Pessoa física";
    $nome = $_POST["nomeVendedor"];
    $email = $_POST["emailVendedor"];
    $cpf = $_POST["cpfVendedor"];
    $data_nasc = $_POST["dataNascimento"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confirmacao_senha = $_POST["confirmacaoSenha"];

    $telefone_convertido = removerMascaraTelefone($telefone);

    // Validação dos dados 
    $msgErro = validarCampos($tipo, $nome, $email, $cpf, $data_nasc, $telefone_convertido, $senha, $confirmacao_senha);


    // Main
    
    if(empty($msgErro)){ //caso não tenha erro

        require_once "../../../model/vendedorDAO.php";

        $id = inserirVendedor($tipo, $nome, $email, $cpf, $data_nasc, $telefone_convertido, $senha);

        // Devolver uma mensagem ou página HTML
        //header("Location:../view/cadastro/cadastro.php?msg=Vendedor inserido com sucesso.");
        header("Location:../../../view/cadastro/cadastro.php?msg=Vendedor inserido com sucesso.");


    } else { //caso tenha erro

        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
        header("Location:../../../view/cadastro/cadastro.php?msgErro=$msgErro");

    }

?>