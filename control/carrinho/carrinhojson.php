<?php

require_once "../FuncoesCarrinho.php";


$idProduto = $_POST["idProduto"];
$acao = $_POST["acao"];

//echo json_encode("$acao - $idProduto");

$msgErro = "";
session_start();


// Verificar qual rota está sendo chamada
switch ($acao) {
    case 'add':
        alterarQtdeCarrinho($idProduto, 1);
        break;

    case 'rem':
        alterarQtdeCarrinho($idProduto, -1);
        break;

    case 'exc':
        removerCarrinho($idProduto);
        break;

    default:
        //echo json_encode(['status' => 'erro', 'mensagem' => 'Rota inválida']);
        $msgErro = "Ação não encontrada.";
        break;
        
}
        
echo json_encode($msgErro);

?>
