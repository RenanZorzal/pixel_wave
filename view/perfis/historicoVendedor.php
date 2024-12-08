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
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <link rel="stylesheet" href="cliente.css">
  <link rel="stylesheet" href="../footer/footer-style.css">  
</head>
<body>

<?php
require_once "../../control/login/validarSessao.php";

$tipoSessao = validarSessao(true, true, false); // Valida a sessão e retorna o tipo

if ($tipoSessao === 'cliente') {
    require_once "../navbar/navbarCliente.php";
} elseif (in_array($tipoSessao, ['vendedor', 'empresa'])) {
    require_once "../navbar/navbarVendEmp.php";
    require_once '../../model/vendedorDAO.php';
} else {
    require_once "../navbar/navbarDeslogado.php";
}

require_once '../../model/vendaDAO.php'; // DAO para vendas

$idVendedor = $_SESSION["idSessao"]; // Obtém o ID do vendedor logado
$resultado = buscarHistorico($idVendedor); // Função para buscar o histórico de vendas


?>

<div class="container mt-5">
    <h1 class="text-center" style="color: #502779;"><b>Histórico de Vendas</b></h1>
    <div class="row mt-4">
    <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                $idVenda = $linha['idVendaCompra'];
                $dataHora = $linha['dataHora'];
                $produto = $linha['nomeProduto'];
                $quantidade = $linha['qtdeItens'];
                $precoUnitario = $linha['precoProduto'];
                $precoTotal = $linha['valorTotal'];
                
                $idProduto = $linha['Produto_idProduto'];
                $status = (int) mostrarStatus($idVenda, $idProduto);
                $endereco = $linha['endereco'];

                // Corrigido o switch para maior clareza e evitar duplicações.
                switch ($status) {
                    case 1:
                        $statusTexto = "Em andamento";
                        break;
                    case 2:
                        $statusTexto = "Realizada";
                        break;
                    case 3:
                        $statusTexto = "Cancelada";
                        break; // Renomeei para diferenciar de "Em andamento".
                    case 4:
                        $statusTexto = "Aguardando pagamento";
                        break;
                    case 5:
                        $statusTexto = "A caminho";
                        break;
                    case 6:
                        $statusTexto = "Reembolsado";
                        break;
                    default:
                        $statusTexto = "Desconhecido";
                        break;
                }
        ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Venda ID: <?php echo $idVenda; ?></h5>
                    <p class="card-text"><b>Data:</b> <?php echo $dataHora; ?></p>
                    <p class="card-text"><b>Produto:</b> <?php echo $produto; ?></p>
                    <p class="card-text"><b>Quantidade:</b> <?php echo $quantidade; ?></p>
                    <p class="card-text"><b>Preço Unitário:</b> R$ <?php echo number_format($precoUnitario, 2, ',', '.'); ?></p>
                    <p class="card-text"><b>Preço Total:</b> R$ <?php echo number_format($precoTotal, 2, ',', '.'); ?></p>
                    <p class="card-text"><b>Status:</b> <?php echo $statusTexto; ?></p>
                    <p class="card-text"><b>Endereço:</b> <?php echo $endereco; ?></p>
                    <button class="btn btn-dark btn-sm w-100" data-bs-toggle="modal" data-bs-target="#statusModal" onclick="prepararModal(<?php echo $idVenda; ?>, '<?php echo $statusTexto; ?>')">Atualizar Status</button>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>Nenhuma venda encontrada.</p>";
        }
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Atualizar Status da Venda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAtualizarStatus" method="POST" action="atualizarStatus.php">
          <input type="hidden" name="idVenda" id="idVenda" value="">
          <div class="mb-3">
            <label for="statusCompra" class="form-label">Novo Status</label>
            <select class="form-select" id="statusCompra" name="statusCompra">
              <option value="1">Andamento</option>
              <option value="2">Realizada</option>
              <option value="3">Cancelada</option>
              <option value="4">Aguardando pagamento</option>
              <option value="5">A caminho</option>
              <option value="6">Reembolsado</option>
            </select>
          </div>
          <button type="submit" class="btn btn-dark w-100">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function prepararModal(idVenda, statusAtual) {
    document.getElementById('idVenda').value = idVenda;
    const statusSelect = document.getElementById('statusCompra');
    for (let i = 0; i < statusSelect.options.length; i++) {
        if (statusSelect.options[i].text === statusAtual) {
            statusSelect.selectedIndex = i;
            break;
        }
    }
}
</script>

</body>
</html>
