<?php
session_start();

require_once '../../control/login/validarSessao.php';
require_once '../../model/vendaDAO.php';

$tipoSessao = validarSessao(true, true, false); // Verifica a sessão

if ($tipoSessao !== 'vendedor' && $tipoSessao !== 'empresa') {
    // Redireciona caso não seja vendedor ou empresa
    header("Location: ../home/home.php");
    exit();
}

// Verifica se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idVenda'], $_POST['statusCompra'], $_POST['idProduto'])) {
    $idVenda = intval($_POST['idVenda']);
    $novoStatus = intval($_POST['statusCompra']);
    $idProduto = intval($_POST['idProduto']); // Certifique-se de sanitizar corretamente
    
    if ($idVenda > 0 && $novoStatus >= 1 && $novoStatus <= 6) {
        $resultado = atualizarStatusVenda($idVenda, $idProduto, $novoStatus);

   

        if ($resultado) {
            // Sucesso
            $_SESSION['mensagem'] = "Status da venda atualizado com sucesso!";
        } else {
            // Falha
            $_SESSION['mensagem'] = "Erro ao atualizar o status da venda.";
        }
    } else {
        $_SESSION['mensagem'] = "Dados inválidos.";
    }
} else {
    $_SESSION['mensagem'] = "Requisição inválida.";
}

// Redireciona para a página de histórico de vendas
header("Location: ../perfis/historicoVendedor.php");
exit();

// Função para atualizar o status da venda
function atualizarStatusVenda($idVenda, $idProduto, $novoStatus) {
    require_once '../../model/a.conexaoBD.php'; // Conexão ao banco

    $conexao = conectarBD(); // Função para conectar ao banco de dados

    $sql = "UPDATE ItensVendaCompra SET Status = ? WHERE VendaCompra_idVendaCompra = ? AND Produto_idProduto = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('iii', $novoStatus, $idVenda, $idProduto);

    $resultado = $stmt->execute();
    $stmt->close();
    $conexao->close();

    return $resultado;
}

?>
