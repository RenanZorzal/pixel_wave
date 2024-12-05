<?php
session_start();

require_once '../../control/login/validarSessao.php';
require_once '../../model/vendaDAO.php';

$tipoSessao = validarSessao(true, true, false); // Verifica a sessão

if ($tipoSessao !== 'vendedor' && $tipoSessao !== 'empresa') {
    // Redireciona caso não seja vendedor ou empresa
    header("Location: ../../index.php");
    exit();
}

// Verifica se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idVenda'], $_POST['statusCompra'])) {
    $idVenda = intval($_POST['idVenda']);
    $novoStatus = intval($_POST['statusCompra']);
    
    // Valida os dados
    if ($idVenda > 0 && $novoStatus >= 1 && $novoStatus <= 6) {
        // Chama a função para atualizar o status no banco de dados
        $resultado = atualizarStatusVenda($idVenda, $novoStatus);

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
header("Location: historicoVendedor.php");
exit();

// Função para atualizar o status da venda
function atualizarStatusVenda($idVenda, $novoStatus) {
    require_once '../../model/a.conexaoBD.php'; // Ajuste para o arquivo correto de configuração do banco

    $conexao = conectarBD(); // Função para conectar ao banco de dados

    $sql = "UPDATE itensvendacompra SET status = ? WHERE VendaCompra_idVendaCompra = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ii', $novoStatus, $idVenda);

    $resultado = $stmt->execute();
    $stmt->close();
    $conexao->close();

    return $resultado;
}
?>
