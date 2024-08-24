<?php
    require "funcoesuteis.php";
    
    // PASSO 1 - Receber os campos POST
    $nomeCliente = $_POST["nomeCliente"];
    $cpfCliente = $_POST["cpfCliente"];
    $emailCliente = $_POST["emailCliente"];
    $telefoneCliente = $_POST["telefoneCliente"];
    $dtNascCliente = $_POST["dtNascCliente"];
    $senha1Cliente = $_POST["senha1Cliente"];
    $senha2Cliente = $_POST["senha2Cliente"];

    // PASSO 2 - Validação dos dados
    $msgErro = validarCampos($nomeCliente, $cpfCliente, $emailCliente, $telefoneCliente, $senha1Cliente, $senha2Cliente);
    if ( empty($msgErro) ) {
        // PASSO 3 - Inserir/Alterar dados no banco
               
        // INSERIR
        require_once '../../../model/clienteDAO.php';
        $id = inserirCliente ($nomeCliente, $emailCliente,$telefoneCliente, $dtNascCliente,  $cpfCliente, $senha1Cliente);

        // PASSO 4 - Devolver uma mensagem ou página HTML
        header("Location:../../../view/cadastro/concluido.php");
       // header("Location:../view/cadastro/cadastro.php?msg=Cliente inserido com sucesso.");



        //TESTE
        /*
        echo "NOME: $nome <br>";
        echo "CPF: $cpf <br>";
        echo "ENDEREÇO: $ender <br>";
        echo "ESTADO: $estado <br>";
        echo "DT. NASC.: $dtNasc <br>";
        echo "SEXO: $sexo <br>";
        echo "CINEMA: $cinema <br>";
        echo "INFORMÁTICA: $info <br>";
        echo "MÚSICA: $musica <br>";
        echo "SENHA 1: $senha1 <br>";
        echo "SENHA 2: $senha2 <br>";
        */
    } else {
        // echo $msgErro;
        header("Location:../../../view/cadastro/error.php?msg=$msgErro");
        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
       
    }
  


?>
