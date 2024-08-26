<?php

    require "funcoes-vendedor.php";
    
    // Receber os campos

    //POST
    $tipo = 1;
    $nome = $_POST["nomeVendedor"];
    $email = $_POST["emailVendedor"];
    $cpf = $_POST["cpfVendedor"];
    $data_nasc = $_POST["dataNascimento"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confirmacao_senha = $_POST["confirmacaoSenha"];

    // Validação dos dados 
    $msgErro = validarCampos($tipo, $nome, $email, $cpf, $data_nasc, $telefone, $senha, $confirmacao_senha);


    // Main
    
    if(empty($msgErro)){ //caso não tenha erro

        require_once "../../../model/vendedorDAO.php";

        $id = inserirVendedor($tipo, $nome, $email, $cpf, $data_nasc, $telefone, $senha);

        // Devolver uma mensagem ou página HTML
        //header("Location:../view/cadastro/cadastro.php?msg=Vendedor inserido com sucesso.");
        header("Location:../../../view/cadastro/cadastro.php?msg=Vendedor inserido com sucesso.");


    } else { //caso tenha erro

        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
        header("Location:../../../view/cadastro/cadastro.php?msg=$msgErro");

    }

?>