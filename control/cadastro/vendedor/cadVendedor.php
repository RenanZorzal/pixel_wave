<?php

require "funcoes-uteis.php";
    
    // PASSO 1 - Receber os campos

    //POST
    $tipo_vendedor = $_POST["tipo-vendedor"];
    $nome = $_POST["nome-vendedor"];
    $email = $_POST["email-vendedor"];
    $cpf = $_POST["cpf-vendedor"];
    $data_nasc = $_POST["data-nascimento"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confimacao_senha = $_POST["confirmacao-senha"];

    // PASSO 2 - Validação dos dados 
    $msgErro = validarCampos($tipo_vendedor, $nome, $email, $cpf, $data_nasc, $telefonee, $senha, $confimacao_senha);



?>