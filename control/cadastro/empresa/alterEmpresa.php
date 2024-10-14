<?php
require_once("funcoes-empresa.php");

// PASSO 1 - Receber os campos POST
$nomeEmpresa = $_POST["nomeEmpresa"];
$emailEmpresa = $_POST["emailEmpresa"];
$dataAbertura = $_POST["dataAbertura"];
$telefoneEmp = $_POST["telefoneEmp"];
$celularEmp = $_POST["celularEmp"];
$razaosocial = $_POST["razaosocial"];
$inscricao = $_POST["inscricao"];
$arquivo = isset($_FILES["arquivoEmp"]) && $_FILES["arquivoEmp"]["error"] == 0 ? $_FILES["arquivoEmp"] : null;
$descricao = $_POST["descEmpresa"];

// PASSO 2 - Validação dos dados
$msgErro = validarCampos2($nomeEmpresa, $emailEmpresa, $dataAbertura, $telefoneEmp, $celularEmp, $razaosocial, $inscricao, $arquivo);
if (empty($msgErro)) {
    // PASSO 3 - Inserir/Alterar dados no banco

    // ALTERAR
    session_start();
    $idValor = $_SESSION["idSessao"];
    require_once '../../../model/empresaDAO.php';
    $id = alterarEmpresa($idValor, $nomeEmpresa, $emailEmpresa, $telefoneEmp, $celularEmp, $arquivo, $razaosocial, $dataAbertura, $inscricao, $descricao);

    // PASSO 4 - Devolver uma mensagem ou página HTML
    header("Location:../../../view/perfis/empresa.php?msg=Empresa alterada com sucesso.");
} else {
    // Em caso de erro, retorna a mensagem de erro
    header("Location:../../../view/perfis/empresa.php?msgErro=$msgErro");
}
?>
