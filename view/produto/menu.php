<?php 
    session_start();
    $idVendedor = $_SESSION["idSessao"];
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
    <link rel="stylesheet" href="menuStyle.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/footer-style.css">  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
        require_once "../navbar/navbarVendEmp.php";
    ?>

    <header>
        <div class="tela-central">

            <div class="novo-produto">
                <a href="produto.php">
                    <img src="mais.png" class="mais-img" alt="Novo Produto">
                    <!--<h5>Novo Produto</h5>-->
                </a>
            </div>

            <div class="pesquisa">
                <div class="input">
                    <input type="text" placeholder="Busque por seus produtos" id="campoPesq" name="campoPesq">
                    <button type="button" id="btnPesq" name="btnPesq">Pesquisar</button>
                </div>
            </div>


        </div>
    </header>

    <main>
        <section class="resultados-pesquisa" id="section-resultado" data-id="<?php echo $idVendedor; ?>">

        </section>
    </main>
        
    <script src="appMenu.js"></script>
</body>
</html>