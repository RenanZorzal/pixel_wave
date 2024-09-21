<?php
    require_once("../../control/cadastro/empresa/funcoes-empresa.php");

     // PASSO 1 - Receber os campos POST
     $nomeEmpresa = $_POST["nomeEmpresa"];
     $emailEmpresa = $_POST["emailEmpresa"];
     $dataAbertura = $_POST["dataAbertura"];
     $telefoneEmp = $_POST["telefoneEmp"];
     $celularEmp = $_POST["celularEmp"];
     $razaosocial = $_POST["razaosocial"];
     $inscricao = $_POST["inscricao"];
     $arquivo = $_FILES["arquivoEmp"];

 
     // PASSO 2 - Validação dos dados
     $msgErro = validarCampos2($nomeEmpresa, $emailEmpresa, $dataAbertura, $telefoneEmp, $celularEmp, $razaosocial, $inscricao);
     if ( empty($msgErro) ) {
         // PASSO 3 - Inserir/Alterar dados no banco
                
         // ALTERAR
         require_once '../../model/empresaDAO.php';
         $id = alterarEmpresa (1, $nomeEmpresa,$emailEmpresa, $telefoneEmp, $celularEmp, $arquivo, $razaosocial, $dataAbertura, $inscricao);
 
         // PASSO 4 - Devolver uma mensagem ou página HTML
         //header("Location:../../../view/cadastro/concluido.php");
        header("Location:empresa.php?msg=Empresa alterado com sucesso.");
 
 
 
     } else {
         // echo $msgErro;
         //header("Location:../../../view/cadastro/error.php?msg=$msgErro");
         header("Location:empresa.php?msgErro=$msgErro");
        
     }

?>