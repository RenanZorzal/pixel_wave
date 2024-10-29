<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="stylePesquisa.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/footer-style.css">

    <title>Pixel Wave</title>
</head>

<body>

    <?php

        require_once "../../control/login/validarSessao.php";

        $tipoSessao = validarSessao(false, false, true); // Valida a sessão e retorna o tipo

        if ($tipoSessao === 'cliente') { // Verifica se é CLIENTE
            require_once "../navbar/navbarCliente.php";

        } elseif ($tipoSessao === 'vendedor' || $tipoSessao === 'empresa') { // Verifica se é VENDEDOR ou EMPRESA
            require_once "../navbar/navbarVendEmp.php";

        } else { // DESLOGADO
            require_once "../navbar/navbarDeslogado.php";
        }

    ?>

    <header>
        <div class="img-empresa">
            <img src="img/empresas-parceiras.png" alt="">
        </div>

        <section class="section-pesquisa"> 
            <div class="input">
                <input type="text" placeholder="Busque pelo nome de uma Empresa" id="campoPesqEmp" name="campoPesqEmp">
                <button type="button" id="btnPesqEmp" name="btnPesqEmp">Pesquisar</button>
            </div>
        </section>
    </header>

    <main>
        <section class="resultados-pesquisa" id="section-resultado">

            <div class="item-resultado">
                <div>
                    <img class="img-resultado" src="img/logo-pixelWave.png" alt="">
                </div>
                <div class="text-resultado"> 
                    <h2>
                        <b><a href="#">Pixel Wave</a></b>
                    </h2>
                    <p class="descricao-meta">Empresa Owner do site em que você está navegando.</p>
                </div>
            </div>

            <div class="item-resultado">
                <div>
                    <img class="img-resultado" src="img/pixelWave.png" alt="">
                </div>
                <div class="text-resultado"> 
                    <h2 class="titulo" >
                        <b><a href="#">Pixel Wave</a></b>
                    </h2>
                    <p class="descricao-meta">Empresa Owner do site em que você está navegando.</p>
                </div>
            </div>

        </section>
    </main>


    <?php
        require_once "../footer/footer.php";

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="app.js"></script>
</body>

</html>