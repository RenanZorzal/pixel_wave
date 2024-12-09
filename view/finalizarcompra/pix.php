<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagamento com PIX</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleHome.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <link rel="stylesheet" href="../footer/footer-style.css">  
</head>
<body>

<?php
  require_once "../../control/login/validarSessao.php";
  $tipoSessao = validarSessao(false, false, true); // Valida a sessão e retorna o tipo
  if ($tipoSessao == 'cliente') {
      require_once "../navbar/navbarCliente.php";
  } elseif ($tipoSessao == 'vendedor' || $tipoSessao == 'empresa') {
      require_once "../navbar/navbarVendEmp.php";
  } else {
      require_once "../navbar/navbarDeslogado.php";
  }
?>

  <div class="container text-center mt-5">
    <h1 class="mb-4">Pagamento com PIX</h1>
    <p class="lead">Leia o QR Code abaixo usando o aplicativo do seu banco para realizar o pagamento:</p>
    <div class="my-4">
      <!-- Substitua 'qrcode-example.png' pelo caminho da imagem do QR Code real -->
      <img src="frame.png" alt="QR Code" class="img-fluid">
    </div>
    <p class="text-muted">Descrição: Compra de produtos no Pixel Wave</p>

<form method="POST" action="../../control/carrinho/finalizarVenda.php">
    <input type="submit" name="btnFinalizar" class="btn btn-dark btn-block btn-lg" value="Continuar">
</form>
  
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
