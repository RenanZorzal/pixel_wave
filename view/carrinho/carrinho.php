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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="carrinhoStyle.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/footer-style.css">  
</head>
<body>

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

    <header>
        <div class="voltar">
            <a href="../home/home.php">
                <img src="button-voltar.png" alt="" class="botaoVoltar">
            </a>
            <a href="../home/home.php">
                <h6>Voltar às compras</h6>
            </a>
        </div>
    </header>

    <main>

        <div>
            
        </div>
        
        <div class="tableCarrinho">
            <div class="header-table">

                <a href='#' class="header-title">
                    <h5 class='' id=''> Meu Carrinho </h5>
                </a>

            </div>

            <div class="header-divisor">

                <p>ITEM</p>
                <p>VALOR</p>

            </div>

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

                    echo "<div class='produto' data-id='$idProduto'>
                            <div class='produto-secao-1'>
                                <img src='data:image/jpeg;base64, $fotoImg' class='img-produto' alt='$nome'>

                                <div class='text'>

                                    <a href='#'>
                                        <h6 class='nome-produto'>$nome</h6>
                                    </a>
                                    <a href='carrinho.php?excID=$idProduto'>
                                        <p>Remover</p>
                                    </a> 

                                </div>
                            </div>

                            <div class='produto-secao-2'>

                                <div class='qtd'>
                                    <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                    <a href='carrinho.php?altID=$idProduto&qtde=-1'>
                                        <i class='fas fa-minus sinal'></i>
                                    </a>

                                    <p>$qtde</p>
                    ";
                    require_once '../../model/vendaDAO.php';
                    $estoque = getEstoque($idProduto);
                    if($_SESSION["carrinho"][$idProduto]["qtde"] < $estoque){
                        echo "               
                                    <a href='carrinho.php?altID=$idProduto&qtde=1'>
                                        <i class='fas fa-plus sinal'></i>
                                    </a>
                                </div>
                                </div>    

                                <p class='preco'>R$ $subTotal</p>
                            </div>  
                        </div>";
                    }
                    else{
                        echo "               
                                    <a href='carrinho.php?Quantidade maior que o estoque'>
                                        <i class='fas fa-plus sinal'></i>
                                    </a>
                                </div>
                                </div>    

                                <p class='preco'>R$ $subTotal</p>
                            </div>  
                        </div>";
                    }
                }
            ?>

            <!--
            <div class="produto">
                <div class="produto-secao-1">
                    <img src="gabinete.jpg" class="img-produto" alt="">

                    <div class="text">

                        <a href="#">
                            <h6 class="nome-produto">Gabinete Samsung Top de linha</h6>
                        </a>
                        <a href="">
                            <p>Remover</p>
                        </a> 

                    </div>
                   
                </div>

                <div class="produto-secao-2">
                    <div class="qtd">
                        <img class="sinal" src="mais.png" alt="">
                        <p>1</p>
                        <img class="sinal" src="menos.png" alt="">
                    </div>
                    <p class="preco">R$ 650,00</p>
                </div>  
            </div> -->

        </div>

        <div class="tableCompra">

            <div class="header-table">

                <a href='#' class="header-title">
                    <h5 class='' id=''> Resumo do Carrinho </h5>
                </a>

            </div>

            <div class="section-compra">

                <div class="header-compra">

                <div class="itens">
                    <p>Itens</p> 
                    <p>( <?php echo $totalItens; ?> )</p>
                </div>
                
                <p>R$ <?php echo number_format($total, 2, ',', '.'); ?></p>

                </div>
        
                <div class="header-compra">

                    <p>Desconto</p>
                    <p>-</p>

                </div>

                <div class="header-total">

                    <h6>Total</h6>
                    <h6>R$ <?php echo number_format($total, 2, ',', '.'); ?></h6>

                </div>

            </div>

        
            <div class="section-botao">

                <h6><a href="../finalizarcompra/entrega.php">Finalizar Compra</a></h6>

            </div>

        </div>

    
    </main>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>