<?php

require_once "funcoesuteis.php";

// Captura os dados do formulário
$email = $_POST["inputEmail"] ?? '';
$senha = $_POST["inputSenha"] ?? '';
$tipo = $_POST["inlineRadioOptions"] ?? '';

// Validações iniciais
$msgErro = validarLogin($email, $senha, $tipo);

if (!empty($msgErro)) {
    header("Location:../../view/login/login.php?msgErro=$msgErro");
    exit();
}

// Inicia a sessão
session_start();

// Função para processar login
function processarLogin($tipo, $email, $senha) {
    switch ($tipo) {
        case 3: // Cliente
            require_once "../../model/clienteDAO.php";
            return verificarLogin($email, $senha);
        case 1: // Vendedor
            require_once "../../model/vendedorDAO.php";
            return verificarLogin($email, $senha);
        case 2: // Empresa
            require_once "../../model/empresaDAO.php";
            return verificarLogin($email, $senha);
        default:
            return null;
    }
}

// Processa o login
$registro = processarLogin($tipo, $email, $senha);

if ($registro !== null) {
    // Define os dados na sessão
    $_SESSION["nomeSessao"] = $registro["nomeVendedor"] ?? $registro["nomeComprador"];
    $_SESSION["idSessao"] = $registro["idVendedor"] ?? $registro["idComprador"];
    $_SESSION["tipoSessao"] = $tipo;
    $_SESSION["carrinho"] = [];

    // Redireciona para a página inicial
    header("Location:../../view/home/home.php");
    exit();
}

// Mensagem de erro para login inválido
$erroMensagem = match ($tipo) {
    3 => "Cliente/senha inválidos! Você já possui cadastro?",
    1, 2 => "Vendedor/senha inválidos! Você já possui cadastro?",
    default => "Usuário inválido."
};

header("Location:../../view/login/login.php?msgErro=$erroMensagem");
exit();

?>
