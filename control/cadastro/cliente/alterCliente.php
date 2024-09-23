<?php
    require_once("funcoesuteis.php");

    // PASSO 1 - Receber os campos POST
    $nomeCliente = $_POST["nomeCliente"];
    $emailCliente = $_POST["emailCliente"];
    $telefoneCliente = $_POST["telefoneCliente"];
    $dtNascCliente = $_POST["dtNascCliente"];
    $arquivo = $_FILES["arquivo"];

    // Verifica se um arquivo foi enviado
    if (!empty($arquivo["name"])) {
        $arquivoCliente = $arquivo; // Novo arquivo foi enviado
    } else {
        $arquivoCliente = null; // Nenhum arquivo enviado
    }

    // PASSO 2 - Validação dos dados
    $msgErro = validarCampos2($nomeCliente, $emailCliente, $telefoneCliente, $arquivoCliente);
    if (empty($msgErro)) {
        // PASSO 3 - Inserir/Alterar dados no banco

        // ALTERAR
        require_once '../../../model/clienteDAO.php';

        // Passa null para o arquivo caso o usuário não tenha enviado uma nova imagem
        $id = alterarCliente(1, $nomeCliente, $emailCliente, $telefoneCliente, $dtNascCliente, $arquivoCliente);

        // PASSO 4 - Devolver uma mensagem ou página HTML
        header("Location:../../../view/perfis/cliente.php?msg=Cliente alterado com sucesso.");
    } else {
        // Caso tenha erro, redireciona com a mensagem de erro
        header("Location:../../../view/perfis/cliente.php?msg=$msgErro");
    }
?>
