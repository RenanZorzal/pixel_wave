<?php
    require_once("funcoesuteis.php");

     // PASSO 1 - Receber os campos POST
     $senha1 = $_POST["senha1"];
     $senha2 = $_POST["senha2"];

    
 
     // PASSO 2 - Validação dos dados
     $msgErro = verificarSenha($senha1, $senha2);
     if ( empty($msgErro) ) {
         // PASSO 3 - Inserir/Alterar dados no banco
                
         // ALTERAR
         require_once '../../../model/vendedorDAO.php';
         session_start();
         $idValor = $_SESSION["idSessao"];
         $id = alterarSenha ($idValor,$senha1);
 
         // PASSO 4 - Devolver uma mensagem ou página HTML
         //header("Location:../../../view/cadastro/concluido.php");
        header("Location:../../../view/perfis/senhavendedor.php?msg=Senha alterada com sucesso.");
 
 
 
     } else {
         // echo $msgErro;
         //header("Location:../../../view/cadastro/error.php?msg=$msgErro");
         header("Location:../../../view/perfis/senhavendedor.php?msg=$msgErro");
        
     }

?>