<?php
    require "funcoesuteis.php";
    
    // PASSO 1 - Receber os campos POST
    $nome = $_POST["nome"];
    $condicao = $_POST["condicao"];
    $anoLancamento = $_POST["anoLancamento"];
    $descricao = $_POST["descricao"];
    $categoria = $_POST["categoria"];
    $preco = $_POST["preco"];
    $status = $_POST["status"];
    $arquivo = $_FILES["arquivo"];
    $estoque = "";
    if($status == "Sem estoque"){
        $estoque = 0;
    }else{
        $estoque = $_POST["quantidade"];
    }
    // PASSO 2 - Validação dos dados
    $msgErro = validarCampos($anoLancamento,$descricao, $preco, $arquivo);
    if ( empty($msgErro) ) {
        // PASSO 3 - Inserir/Alterar dados no banco
               
        // INSERIR
        require_once '../../model/produtoDAO.php';
        $id = inserirProduto (1, $nome, $status, $anoLancamento, $preco, $arquivo, $descricao, $categoria, $condicao, $estoque);

        // PASSO 4 - Devolver uma mensagem ou página HTML
        header("Location:../../view/produto/produto.php?msg=Produto inserido com sucesso.");
       // header("Location:../view/cadastro/cadastro.php?msg=Cliente inserido com sucesso.");

    } else {
        // echo $msgErro;
        header("Location:../../view/produto/produto.php?msg=$msgErro");
        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
       
    }
  


?>