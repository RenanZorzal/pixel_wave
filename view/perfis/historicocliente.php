<?php
session_start();
require_once '../../model/clienteDAO.php';
require_once '../../model/vendaDAO.php'; // Assumindo que você tem um DAO para vendas também

$idComprador = $_SESSION["idSessao"]; // Obtém o ID do comprador logado

// Função para buscar o histórico de compras
$resultado = buscarHistorico($idComprador);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Histórico de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center" style="color: #502779;"><b>Histórico de Compras</b></h1>
    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID da Venda</th>
                <th>Data</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Preço Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                    $vendaAtual = null;
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        $idVenda = $linha['idVendaCompra'];
    
                        // Exibir ID e data da venda apenas na primeira linha de cada venda
                        if ($vendaAtual !== $idVenda) {
                            $vendaAtual = $idVenda;
                            echo "<tr>
                                    <td rowspan='1'>{$linha['idVendaCompra']}</td>
                                    <td rowspan='1'>{$linha['dataHora']}</td>";
                        } else {
                            echo "<tr><td colspan='2'></td>";
                        }
    
                        echo    "<td>{$linha['nomeProduto']}</td>
                                 <td>{$linha['qtdeItens']}</td>
                                 <td>R$ {$linha['precoProduto']}</td>
                                 <td>R$ {$linha['valorTotal']}</td>
                              </tr>";
                    }
                } else {
                echo "<tr><td colspan='6' class='text-center'>Nenhuma compra encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
