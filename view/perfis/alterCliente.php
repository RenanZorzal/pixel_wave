<?php
    require_once("../cadastro/cliente/funcoesuteis.php");

     // PASSO 1 - Receber os campos POST
     $nomeCliente = $_POST["nomeCliente"];
     $emailCliente = $_POST["emailCliente"];
     $telefoneCliente = $_POST["telefoneCliente"];
     $dtNascCliente = $_POST["dtNascCliente"];

 
     // PASSO 2 - Validação dos dados
     $msgErro = validarCampos($nomeCliente,$emailCliente, $telefoneCliente);
     if ( empty($msgErro) ) {
         // PASSO 3 - Inserir/Alterar dados no banco
                
         // ALTERAR
         require_once '../../../model/clienteDAO.php';
         $id = alterarCliente ($nomeCliente, $emailCliente,$telefoneCliente, $dtNascCliente,  $cpfCliente, $senha1Cliente);
 
         // PASSO 4 - Devolver uma mensagem ou página HTML
         //header("Location:../../../view/cadastro/concluido.php");
        header("Location:cliente.php?msg=Cliente alterado com sucesso.");
 
 
 
     } else {
         // echo $msgErro;
         //header("Location:../../../view/cadastro/error.php?msg=$msgErro");
         header("Location:cliente.php?msgErro=$msgErro");
        
     }

?>