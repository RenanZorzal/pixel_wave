<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pixel Wave</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CSS (opcional, para ícones) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="compra.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <link rel="stylesheet" href="../home/home.css">
</head>

<?php

require_once "../../control/login/validarSessao.php";

$tipoSessao = validarSessao(false, false, true); // Valida a sessão e retorna o tipo

if ($tipoSessao == 'cliente') { // Verifica se é CLIENTE
    require_once "../navbar/navbarCliente.php";

} elseif ($tipoSessao == 'vendedor' || $tipoSessao == 'empresa') { // Verifica se é VENDEDOR ou EMPRESA
    require_once "../navbar/navbarVendEmp.php";

} else { // DESLOGADO
    require_once "../navbar/navbarDeslogado.php";
}

if (isset($_GET["id"])) { 
  $idProduto = $_GET["id"];
}
require_once '../../model/produtoDAO.php';
$resultado = pesquisarProdutoPorID($idProduto);
$registro = mysqli_fetch_assoc($resultado);
$nome = $registro["nomeProduto"];
$status = $registro["statusProduto"];
$ano = $registro["anoProduto"];
$preco = $registro["precoProduto"];
$arquivo = $registro["imagemProduto"];
$descricao = $registro["descricaoProduto"];
$condicao = $registro["condicaoProduto"];
$estoque = $registro["qtdEstoque"];
$fotoImg = base64_encode($arquivo);
$vendedor = $registro["Vendedor_idVendedor"];


$nomeVend = nomeVendedor($vendedor);

?>

<!--Página-->
<h1 class="h1 d-flex justify-content-center m-4"> <b><?php echo $nome; ?></b></h1>
<div class="product-container">
<img class="product-image" src="data:image/jpeg;base64,<?php echo $fotoImg; ?>"></img>

  <div class="product-details ms-5">
      <div class="seller-info">
          Vendido e entregue por: <a href=""><?php echo $nomeVend; ?></a><br>
          Condição: <?php echo $condicao; ?>
      </div>

      <div class="price-sale">
      R$<?php echo $preco; ?>
      </div>
      
      <div class="discount-info">
      <b>
      <?php if($status == "disponível"){
        echo "Em estoque: $estoque";
      }
        ?>  
        </b>
      <br>
      <br>
        À vista no PIX
      </div>
      
    


      <div class="price-sale">
       
      <a class='btn btn-dark' href="../carrinho/carrinho.php?addID=<?php echo $idProduto; ?>&nome=<?php echo urlencode($nome); ?>&preco=<?php echo urlencode($preco); ?>"><i class="bi bi-cart-plus"> Adicionar ao Carrinho</i></a>
    </div>

  </div>
  
</div>

<div class="m-4">
  <div class="accordion" id="accordionExample1" style="width: 95%;">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <h1 class="h1"><i class="bi bi-info" style="color: blueviolet;"></i>DESCRIÇÃO DO PRODUTO</h1>
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
        <div class="accordion-body">
          <p><?php echo $nome; ?><br><br>
            <?php echo $descricao; ?>
            <br><br>
        </div>
      </div>
    </div>
  </div>
</div>





<div class=" m-4">
  
  
</div>






</body>
</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
