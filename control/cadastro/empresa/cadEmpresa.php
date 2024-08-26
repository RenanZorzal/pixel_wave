<?php

    require "funcoes-empresa.php";
    
    // Receber os campos

    //POST
    $tipo = 2;
    $nome = $_POST["nomeEmpresa"];
    $email = $_POST["email"];
    $cnpj = $_POST["cnpj"];
    $data_abertura = $_POST["dataAbertura"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $razaoSocial = $_POST["razaoSocial"];
    $inscricaoEstadual = $_POST["inscricaoEstadual"];
    $senha = $_POST["senha"];
    $confirmacao_senha = $_POST["confirmacaoSenha"];

    // Validação dos dados 
    $msgErro = validarCampos($tipo, $nome, $email, $cnpj, $data_abertura, $telefone, $celular, $razaoSocial, $inscricaoEstadual, $senha, $confirmacao_senha);


    // Main
    
    if(empty($msgErro)){ //caso não tenha erro

        require_once "../../../model/empresaDAO.php";

        $id = inserirEmpresa($tipo, $nome, $email, $cnpj, $data_abertura, $telefone, $celular, $razaoSocial, $inscricaoEstadual, $senha);

        // Devolver uma mensagem ou página HTML
        //header("Location:../view/cadastro/cadastro.php?msg=Empresa inserida com sucesso.");
        header("Location:../../../view/cadastro/cadastro.php?msg=Empresa inserida com sucesso.");


    } else { //caso tenha erro

        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
        header("Location:../../../view/cadastro/cadastro.php?msgErro=$msgErro");

    }

?>