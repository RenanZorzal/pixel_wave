<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="stylePerfil.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/footer-style.css">

    <title>Pixel Wave</title>
</head>
<body>

    <!--navbar-->
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


        if (isset($_GET["id"])) { 
            $idEmpresa = $_GET["id"];
        }

        require_once '../../model/vendedorDAO.php';
        $resultado = pesquisarVendedorPorID($idEmpresa);
        $registro = mysqli_fetch_assoc($resultado);
        $nome = $registro["nomeVendedor"];
        $desc = $registro["descricaoVendedor"];
        $email = $registro["emailVendedor"];
        $telefone = $registro["telefoneVendedor"];
        $celular = $registro["celularVendedor"];
        $cnpj= $registro["CNPJ_CPF"];
        $razaoSocial = $registro["razaoSocial"];
        $dtNasc = $registro["data_nascimentoVendedor"];
        $inscricaoEstadual = $registro["inscricaoEstadual"];
        $arquivo = $registro["imgVendedor"];
        $fotoImg = base64_encode($arquivo);
    ?>
    
    <main>

        <div class="d-flex justify-content-center align-items-center">
            <div class="mt-5 shadow-box2" style="background-color: white">
                <div class="d-flex justify-contentet-center align-items-center perfil">
                    <?php
                    echo '<img id="image-profile" class="image-profile mt-2 shadow-box" src="data:image/jpeg;base64,' . $fotoImg . '">';
                    echo '<h1 style="text-align: center; color: #502779; margin-bottom: 1rem" class="ms-5"><b>'. $nome .'</b></h1>';
                    echo '<div class="descricao">';
                    echo '<p style="text-align: center">'. $desc .'</p>';
                    echo '</div>';
                    ?>
                </div>
            </div>
        </div>

        <section class="section-pesquisa"> 
            <div class="input">
                <input type="text" placeholder="Pesquise por um produto deste vendedor" id="campoPesqProduto" name="campoPesqProduto">
                <button type="button" id="btnPesqProdutoVendedor" name="btnPesqProdutoVendedor">Pesquisar</button>
            </div>
        </section>

        <div clas="class-img" style="width: 100%; display: flex; justify-content: center">
            <img src="img/catalogo-produtos.png" class="img-produtos" alt="Produtos da Empresa">
        </div>

        <div class="row div-resultado" data-id="<?php echo $idEmpresa; ?>" id = "resultado-pecas">

        </div>

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

    <script src="perfil-app.js"></script>
    
</body>
</html>