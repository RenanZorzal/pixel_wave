<?php
    session_start();

    require "funcoesuteis.php";
    // PASSO 1 - Receber os campos POST
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    

    // PASSO 2 - Validação dos dados
    $msgErro = validarCampos($cep,$logradouro, $numero, $bairro, $cidade, $estado);
    if ( empty($msgErro) ) {
        // PASSO 3 - Inserir/Alterar dados no banco
               
        // INSERIR
        require_once '../../model/vendaDAO.php';
        $endereco = $logradouro . ", " . $numero . " - " . $bairro . ", " . $cep . ", " . $cidade . " - " . $estado;
        $idCliente = $_SESSION["idSessao"];
        alterarEndereço ($idCliente, $endereco);

        // PASSO 4 - Devolver uma mensagem ou página HTML
        header("Location:../../view/finalizarcompra/pix.php");
       // header("Location:../view/cadastro/cadastro.php?msg=Cliente inserido com sucesso.");

    } else {
        // echo $msgErro;
        header("Location:../../view/finalizarcompra/entrega.php?msg=$msgErro");
        //header("Location:../view/cadastro/cadastro.php?msg=$msgErro");
       
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    



?>