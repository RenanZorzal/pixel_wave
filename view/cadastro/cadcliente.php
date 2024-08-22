<?php
    require "funcoesuteis.php";
    
    // PASSO 1 - Receber os campos POST
    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCPF"];
    $email = $_POST["txtEmail"];
    $telefone = $_POST["txtTelefone"];
    $dtNasc = $_POST["txtData"];
    $sexo = $_POST["txtSexo"];
    $senha1 = $_POST["txtSenha1"];
    $senha2 = $_POST["txtSenha2"];

    // PASSO 2 - Validação dos dados
    $msgErro = validarCampos($nome, $cpf, $email, $telefone, $dtNasc, $sexo, $senha1, $senha2);
    if ( empty($msgErro) ) {
        // PASSO 3 - Inserir/Alterar dados no banco
               
        // INSERIR
        require_once '../model/clienteDAO.php';
        $id = inserirCliente ($nome, $cpf, $email, $telefone, 
                        $dtNasc, $sexo, $senha1);

        // PASSO 4 - Devolver uma mensagem ou página HTML
        header("Location:../view/cadastro/cliente/cadastrocliente.php?msg=Cliente $id inserido com sucesso.");



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
        header("Location:../view/formulario.php?msg=$msgErro");
    }


?>