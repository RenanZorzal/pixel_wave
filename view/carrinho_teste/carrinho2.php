<?php
session_start();
?>
<?php

require_once "../../control/login/validarSessao.php";

$tipoSessao = validarSessao(false, false, true); // Valida a sessão e retorna o tipo

if ($tipoSessao == 'cliente') { // Verifica se é CLIENTE
    

} elseif ($tipoSessao == 'vendedor' || $tipoSessao == 'empresa') { // Verifica se é VENDEDOR ou EMPRESA
    header("Location: ../home/home.php"); 

} else { // DESLOGADO
    header("Location: ../home/home.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Wave</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="carrinho.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/footer-style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<?php

require_once '../../control/carrinho/funcoesCarrinho.php';

//Adicionar
if (isset($_GET["addID"])) {
    $idProduto = $_GET["addID"];
    $nome = $_GET["nome"];
    $preco = $_GET["preco"];

    inserirCarrinho($idProduto, $nome, $preco, 1, $idProduto);
}

//Excluir
if (isset($_GET["excID"])) {
    $idProduto = $_GET["excID"];
    removerCarrinho($idProduto);
}

//Alterar
if (isset($_GET["altID"])) {
    $idProduto = $_GET["altID"];
    $qtde = $_GET["qtde"];
    alterarQtdeCarrinho($idProduto, $qtde);
}

// Calcular o total de itens no carrinho somando todas as quantidades
$carrinho = $_SESSION["carrinho"];
$totalItens = 0;
foreach ($carrinho as $produto) {
    $totalItens += $produto["qtde"];
}

?>
<body>
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0">Carrinho</h1>
                                            <h6 class="mb-0 text-muted" id="itemCount"><?php echo $totalItens; ?> itens</h6>
                                        </div>
                                        <hr class="my-4">

                                        <div id="cartItems">
                                            <!-- Conteúdo do carrinho gerado dinamicamente -->
                                            <?php
                                            $total = 0;
                                            foreach ($carrinho as $idProduto => $produto) {
                                                $nome = $produto["nome"];
                                                $qtde = (int) $produto["qtde"];
                                                $preco = (float) $produto["preco"];
                                                $idProduto = (int) $produto["idProduto"];
                                                require_once '../../model/produtoDAO.php';
                                                $resultado = pesquisarProdutoPorID($idProduto);
                                                $registro = mysqli_fetch_assoc($resultado);
                                                $arquivo = $registro["imagemProduto"];
                                                $fotoImg = base64_encode($arquivo);
                                                $subTotal = $qtde * $preco;
                                                $total += $subTotal;
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center' data-id='$idProduto'>
                                                    <div class='col-md-2 col-lg-2 col-xl-2'>
                                                        <img src='data:image/jpeg;base64, $fotoImg' class='img-fluid rounded-3' alt='Product Image'>
                                                    </div>
                                                    <div class='col-md-3 col-lg-3 col-xl-3'>
                                                        <h6 class='text-muted'>$nome</h6>
                                                    </div>
                                                    <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                                        <a href='carrinho2.php?altID=$idProduto&qtde=-1'>
                                                            <i class='fas fa-minus'></i>
                                                        </a>
                                                        <input id='quantity$idProduto' min='1' name='quantity' value='$qtde' type='number' class='form-control form-control-sm ms-2 me-2' readonly />
                                                        <a href='carrinho2.php?altID=$idProduto&qtde=1'>
                                                            <i class='fas fa-plus'></i>
                                                        </a>
                                                    </div>
                                                    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                                                        <h6 class='mb-0'>R$ <span id='subtotal$idProduto'>".number_format($subTotal, 2, ',', '.')."</span></h6>
                                                    </div>
                                                    <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                                                        <a href='carrinho2.php?excID=$idProduto' class='text-muted'><i class='fas fa-times'></i></a>
                                                    </div>
                                                </div>
                                                <hr class='my-4'>";
                                            }
                                            ?>
                                        </div>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="../home/home.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Voltar</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Resumo</h3>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Total de Itens</h5>
                                            <h5 id="totalItems"><?php echo $totalItens; ?></h5>
                                        </div>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Valor Total</h5>
                                            <h5>R$ <span id="totalPrice"><?php echo number_format($total, 2, ',', '.'); ?></span></h5>
                                        </div>
                                        
                                        <form method="POST" action="../../control/carrinho/finalizarVenda.php">
                                        <input type="submit" name="btnFinalizar" class="btn btn-dark btn-block btn-lg"></input>
                                        </form>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>
