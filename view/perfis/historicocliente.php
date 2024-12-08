<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Histórico de Vendas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <link rel="stylesheet" href="cliente.css">
  <link rel="stylesheet" href="../footer/footer-style.css">
  <style>
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Ajusta dinamicamente */
      gap: 20px; /* Espaçamento entre os cards */
    }
    .card {
      height: 100%; /* Garante altura uniforme */
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .card-body {
      flex-grow: 1; /* Ocupa o espaço restante dentro do card */
    }
    .card-footer {
      text-align: right; /* Alinha o rodapé à direita */
    }
  </style>
</head>
<body>

<?php
require_once "../../control/login/validarSessao.php";
$tipoSessao = validarSessao(false, false, true);

if ($tipoSessao === 'cliente') {
    require_once "../navbar/navbarCliente.php";
    require_once '../../model/clienteDAO.php';
} elseif ($tipoSessao === 'vendedor' || $tipoSessao === 'empresa') {
    require_once "../navbar/navbarVendEmp.php";
} else {
    require_once "../navbar/navbarDeslogado.php";
}

$idComprador = $_SESSION["idSessao"];
$resultado = buscarHistorico($idComprador);
?>

<div class="container mt-5">
    <h1 class="text-center" style="color: #502779;"><b>Histórico de Compras</b></h1>
    <div class="card-grid mt-4">
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            $vendaAtual = null;
            $contador = 1;
            while ($linha = mysqli_fetch_assoc($resultado)) {
                $idVenda = $linha['idVendaCompra'];

                // Novo card para cada venda
                if ($vendaAtual !== $idVenda) {
                    if ($vendaAtual !== null) {
                        echo '</ul></div><div class="card-footer"><small>Final da compra</small></div></div>'; // Fecha o card anterior
                    }
                    $vendaAtual = $idVenda;

                    echo "<div class='card shadow'>
                            <div class='card-header bg-dark text-white'>
                                <h5 class='mb-0'>Compra #{$contador}</h5>
                                <small>Data: {$linha['dataHora']}</small>
                            </div>
                            <div class='card-body'>
                                <h6>Produtos:</h6>
                                <ul class='list-unstyled'>";
                                $contador = $contador+1;
                }
                if($linha['Status'] == 1){
                    $status = "Andamento";
                }
                if($linha['Status'] == 2){
                    $status = "Realizada";
                }
                if($linha['Status'] == 3){
                    $status = "Andamento";
                }
                if($linha['Status'] == 4){
                    $status = "Aguardando pagamento";
                }
                if($linha['Status'] == 5){
                    $status = "A caminho";
                }
                if($linha['Status'] == 6){
                    $status = "Reembolsado";
                }
                // Detalhes dos produtos
                echo "<li class='mb-2'>
                        <b>Produto:</b> {$linha['nomeProduto']} <br>
                        <b>Quantidade:</b> {$linha['qtdeItens']} <br>
                        <b>Preço Unitário:</b> R$ {$linha['precoProduto']} <br>
                        <b>Total:</b> R$ {$linha['valorTotal']}<br>
                        <b>Status:</b>{$status}<br>
                        <b>Endereço:</b>{$linha['endereco']}<br>
                        ----------
                      </li>";
            }
            echo '</ul></div><div class="card-footer"><small>Final da venda</small></div></div>'; // Fecha o último card
        } else {
            echo "<p class='text-center'>Nenhuma compra encontrada.</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
