<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="stylePesquisa.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/styleFooter.css">

    <title>Pixel Wave</title>
</head>

<body>

    <!--navbar-->
    <?php
    require_once "../navbar/navbarCliente.php";
    ?>

    <header>
        <div class="img-empresa">
            <img src="img/empresas-parceiras.png" alt="">
        </div>

        <section class="section-pesquisa"> 
            <div class="input">
                <input type="text" placeholder="Busque pelo nome de uma Empresa" id="campoPesquisa">
                <button type="button" id="btnPesquisa" name="btnPesquisa" onclick="pesquisar()">Pesquisar</button>
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
                    <p class="link-meta">
                        <a href="#">Área de atuação: Tecnologia em geral.</a> 
                    </p>
                    <p class="descricao-meta">Empresa Owner do site em que você está navegando.</p>
                </div>
            </div>
            <div class="item-resultado">
                <div>
                    <img class="img-resultado" src="img/pixelWave.png" alt="">
                </div>
                <div class="text-resultado"> 
                    <h2>
                        <b><a href="#">Pixel Wave</a></b>
                    </h2>
                    <p class="link-meta">
                        <a href="#">Área de atuação: Tecnologia em geral.</a> 
                    </p>
                    <p class="descricao-meta">Empresa Owner do site em que você está navegando.</p>
                </div>
            </div>
        </section>
    </main>


    <?php
        require_once "../footer/footer.php";

    ?>

    <script src="app.js"></script>
</body>

</html>