<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Histórico de Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap Icons CSS (opcional, para ícones) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <link rel="stylesheet" href="../footer/footer-style.css">  
</head>
<body>

<?php
require_once "../../control/login/validarSessao.php";

$tipoSessao = validarSessao(true, true, false); // Valida a sessão e retorna o tipo

if ($tipoSessao === 'cliente') { // Verifica se é CLIENTE
    require_once "../navbar/navbarCliente.php";

}if ($tipoSessao === 'vendedor') { // Verifica se é CLIENTE
    require_once "../navbar/navbarVendEmp.php";
    require_once '../../model/vendedorDAO.php';
 }
 
 
 elseif ($tipoSessao === 'empresa') { // Verifica se é VENDEDOR ou EMPRESA
    require_once "../navbar/navbarVendEmp.php";
    require_once '../../model/empresaDAO.php';

} else { // DESLOGADO
    require_once "../navbar/navbarDeslogado.php";
}

require_once '../../model/vendaDAO.php'; // Assumindo que você tem um DAO para vendas também

$idVendedor = $_SESSION["idSessao"]; // Obtém o ID do comprador logado

// Função para buscar o histórico de compras
$resultado = buscarHistorico($idVendedor);

?>

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
