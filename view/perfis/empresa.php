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
  <link rel="stylesheet" href="cliente.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  
</head>
<body>

<?php
require_once "../navbar/navbarVendEmp.php";
?>


<!--Página-->
<div class="d-flex justify-content-center align-items-center">
<div class="mt-5 shadow-box2" style="background-color: white">
<div class="d-flex justify-contentet-center align-items-center">
<img id="image-profile" class="image-profile mt-2 shadow-box" style="rounded" src="https://via.placeholder.com/100">
<h1 style="text-align: center; color: #502779" class="ms-5"><b>MINHA EMPRESA</b></h1>
</div>
        <div class="container form-container">
    <?php
        require_once '../../model/empresaDAO.php';
        $resultado = pesquisarEmpresaPorID(2);
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
        


    ?>
    <form action="alterEmpresa.php" method="POST" enctype = "multipart/form-data" >
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome da empresa</label>
                <input type="text" class="form-control shadow-box" id="nome" value="<?php echo $nome; ?>">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control shadow-box" id="email" value="<?php echo $email; ?>">
                
            </div>
            <div class="col-md-6">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control shadow-box" id="cpnj" name="cnpj" value="<?php echo $cnpj; ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="data-abertura" class="form-label">Data de abertura</label>
                <input type="date" class="form-control shadow-box" id="data-nascimento" value="<?php echo $dtNasc; ?>">
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control shadow-box" id="telefone" value="<?php echo $telefone; ?>">
            </div>
            <div class="col-md-6">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control shadow-box" id="celular" value="<?php echo $celular; ?>">
            </div>
            <div class="col-md-6">
                <label for="razaosocial" class="form-label">Razão Social</label>
                <input type="text" class="form-control shadow-box" id="razaosocial" value="<?php echo $razaoSocial; ?>">
            </div>
            <div class="col-md-6">
                <label for="inscricao" class="form-label">Inscrição Estadual</label>
                <input type="text" class="form-control shadow-box" id="inscricao" value="<?php echo $inscricaoEstadual; ?>">
            </div>

        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <label for="imagem" class="form-label">Imagem <i class="bi bi-upload"></i></label>
                <input type="file" class="form-control shadow-box" id="imagem" accept="image/*" onchange="previewImage(event)">
                <!-- A imagem padrão exibida inicialmente -->
                <img id="image-preview" class="image-preview mt-2 shadow-box" src="https://via.placeholder.com/100">
            </div>
        </div>
        </div>
        
        <div class="mt-4 d-flex justify-content-center">
            <button type="button" class="btn justify-content-center fs-5" style="background-color:#502779; color:white">Salvar alterações</button>
            <a href="#" class="text-decoration-none text-center fs-5 m-3" style="color: #502779"><u>Alterar senha</u></a>
            <a href="#" class="text-decoration-none text-center fs-5 m-3" style="color: #502779"><u>Meus anúncios</u></a>
 
        </div>
        <div class="d-flex flex-column justify-content-center mt-4">
            
            
        </div>
        </div>
    </form>

</div>
</div>
</div>
<script>
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(){
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
</body>
</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
