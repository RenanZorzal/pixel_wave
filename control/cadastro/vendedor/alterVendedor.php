<?php
    require_once("funcoes-vendedor.php");

     // PASSO 1 - Receber os campos POST
     $nomeVendedorAu = $_POST["nomeVendedor"];
     $emailVendedor = $_POST["emailVendedor"];
     $telefoneVendedor = $_POST["telefoneVendedor"];
     $dtNascVendedor = $_POST["dtNascVendedor"];
     $descricao = $_POST["descricaoVendA"];
     $arquivo = $_FILES["arquivoVend"];

 
     // PASSO 2 - Validação dos dados
     $msgErro = validarCampos2($nomeVendedorAu, $emailVendedor, $dtNascVendedor, $telefoneVendedor, $arquivo);
     if ( empty($msgErro) ) {
         // PASSO 3 - Inserir/Alterar dados no banco
                
         // ALTERAR
         require_once '../../../model/vendedorDAO.php';
         $id = alterarVendedor (1,$nomeVendedorAu, $emailVendedor,$telefoneVendedor, $dtNascVendedor, $arquivo, $descricao);
 
         // PASSO 4 - Devolver uma mensagem ou página HTML
         //header("Location:../../../view/cadastro/concluido.php");
        header("Location:../../../view/perfis/vendedor.php?msg=Vendedor alterado com sucesso.");
 
 
 
     } else {
         // echo $msgErro;
         //header("Location:../../../view/cadastro/error.php?msg=$msgErro");
         header("Location:../../../view/perfis/vendedor.php?msg=$msgErro");
        
     }

?>