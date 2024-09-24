<?php
    require_once("funcoes-vendedor.php");

     // PASSO 1 - Receber os campos POST
     $nomeVendedorAu = $_POST["nomeVendedor"];
     $emailVendedor = $_POST["emailVendedor"];
     $telefoneVendedor = $_POST["telefoneVendedor"];
     $dtNascVendedor = $_POST["dtNascVendedor"];
     $descricao = $_POST["descricaoVendA"];
     $arquivo = isset($_FILES["arquivoVend"]) && $_FILES["arquivoVend"]["error"] == 0 ? $_FILES["arquivoVend"] : null;

     // PASSO 2 - Validação dos dados
     $msgErro = validarCampos2($nomeVendedorAu, $emailVendedor, $dtNascVendedor, $telefoneVendedor, $arquivo);
     if (empty($msgErro)) {
         // PASSO 3 - Inserir/Alterar dados no banco
         require_once '../../../model/vendedorDAO.php';
         
         // Passa null como arquivo se não for enviado
         $id = alterarVendedor(1, $nomeVendedorAu, $emailVendedor, $telefoneVendedor, $dtNascVendedor, $arquivo, $descricao);
 
         // PASSO 4 - Devolver uma mensagem ou página HTML
         header("Location:../../../view/perfis/vendedor.php?msg=Vendedor alterado com sucesso.");
 
     } else {
         header("Location:../../../view/perfis/vendedor.php?msgErro=$msgErro");
     }
?>
