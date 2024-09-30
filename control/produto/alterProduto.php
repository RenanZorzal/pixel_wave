<?php
    require "funcoesuteis.php";
    
    // PASSO 1 - Receber os campos POST
    $nome = $_POST["nome"];
    $condicao = $_POST["condicao"];
    $anoLancamento = $_POST["anoLancamento"];
    $descricao = $_POST["descricao"];
    $categoria = (int) $_POST["categoria"];
    $subcategoria = (int) $_POST["subcategoria"];
    $preco = $_POST["preco"];
    $status = $_POST["status"];
    $arquivo = $_FILES["arquivo"];
    $estoque = $_POST["quantidade"];
    
    
    
    
 
    // PASSO 2 - Validação dos dados
    $msgErro = validarCampos($anoLancamento,$descricao, $preco, $arquivo,$estoque, $status, $subcategoria);
    if ( empty($msgErro) ) {
        // PASSO 3 - Inserir/Alterar dados no banco
               
        // INSERIR
        require_once '../../model/produtoDAO.php';
        $id = alterarProduto (28, $nome, $status, $anoLancamento, $preco, $arquivo, $descricao, $subcategoria , $condicao, $estoque);

        // PASSO 4 - Devolver uma mensagem ou página HTML
        header("Location:../../view/produto/alterarproduto.php?msg=Produto alterado com sucesso.");
       // header("Location:../view/cadastro/cadastro.php?msg=Cliente inserido com sucesso.");

    } else {
        // echo $msgErro;
        header("Location:../../view/produto/alterarproduto.php?msgErro=$msgErro");
        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
       
    }
  
    

?>