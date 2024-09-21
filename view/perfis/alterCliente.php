<?php
    require_once("../../control/cadastro/cliente/funcoesuteis.php");

     // PASSO 1 - Receber os campos POST
     $nomeCliente = $_POST["nomeCliente"];
     $emailCliente = $_POST["emailCliente"];
     $telefoneCliente = $_POST["telefoneCliente"];
     $dtNascCliente = $_POST["dtNascCliente"];
     $arquivo = $_FILES["arquivo"];

 
     // PASSO 2 - Validação dos dados
     $msgErro = validarCampos2($nomeCliente, $emailCliente, $telefoneCliente, $arquivo);
     if ( empty($msgErro) ) {
         // PASSO 3 - Inserir/Alterar dados no banco
                
         // ALTERAR
         require_once '../../model/clienteDAO.php';
         $id = alterarCliente (1,$nomeCliente, $emailCliente,$telefoneCliente, $dtNascCliente, $arquivo);
 
         // PASSO 4 - Devolver uma mensagem ou página HTML
         //header("Location:../../../view/cadastro/concluido.php");
        header("Location:cliente.php?msg=Cliente alterado com sucesso.");
 
 
 
     } else {
         // echo $msgErro;
         //header("Location:../../../view/cadastro/error.php?msg=$msgErro");
         header("Location:cliente.php?msgErro=$msgErro");
        
     }

?>