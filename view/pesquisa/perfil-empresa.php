<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="estilo-perfil.css">
    <link rel="stylesheet" href="../navbar/estilo.css">
    <link rel="stylesheet" href="../footer/footer-style.css">

    <title>Pixel Wave</title>
</head>
<body>

<!--navbar-->
<?php
require_once "../navbar/navbarCliente.php";

if (isset($_GET["id"])) {  // Verifica se tem mensagem de ERRO
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
                    echo '<h1 style="text-align: center; color: #502779" class="ms-5"><b>'. $nome .'</b></h1>';
                    echo '<p>'. $desc .'</p>';
                    ?>
                </div>
            </div>
        </div>

        <div clas="class-img" style="width: 100%; display: flex; justify-content: center">
            <img src="img/catalogo-produtos.png" class="img-produtos" alt="Produtos da Empresa">
        </div>

        <div class="row div-resultado" data-id="<?php echo $idEmpresa; ?>" id = "resultado-pecas">

        </div>

    </main>

    <?php
        require_once "../footer/footer.php";

    ?>

    <script src="perfil-app.js"></script>
    
</body>
</html>