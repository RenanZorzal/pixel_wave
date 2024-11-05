<?php
  session_start();
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
    <link rel="stylesheet" href="styleCarrinho.css">
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

    ?>


    <main>
        
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

            <div class="produto">
                <img src="gabinete.jpg" class="img-produto" alt="">
            </div>

        </div>

        <div class="tableCompra">

            <div class="header-table">

                <a href='#' class="header-title">
                    <h5 class='' id=''> Resumo do Carrinho </h5>
                </a>

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