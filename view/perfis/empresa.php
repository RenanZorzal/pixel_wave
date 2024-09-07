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
<body style="background-color: rgb(246, 236, 255);">

<?php
require_once "../navbar/navbar.php";
?>


<!--Página-->
<div class="d-flex justify-content-center align-items-center">
<div class="mt-5 shadow-box2" style="background-color: white">
        <h1 style="text-align: center; color: #502779"><b>MINHA EMPRESA</b></h1>
        <div class="container form-container">
    <form>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome da empresa</label>
                <input type="text" class="form-control shadow-box" id="nome" placeholder="Nome">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control shadow-box" id="email" placeholder="teste@gmail.com">
                
            </div>
            <div class="col-md-6">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control shadow-box" id="cpf" placeholder="111.111.111-11" disabled>
            </div>
            <div class="col-md-6">
                <label for="data-abertura" class="form-label">Data de abertura</label>
                <input type="date" class="form-control shadow-box" id="data-nascimento" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control shadow-box" id="telefone" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control shadow-box" id="celular" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="razaosocial" class="form-label">Razão Social</label>
                <input type="text" class="form-control shadow-box" id="razaosocial" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="inscricao" class="form-label">Inscrição Estadual</label>
                <input type="text" class="form-control shadow-box" id="inscricao" placeholder="">
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
 
        </div>
        <div class="d-flex flex-column justify-content-center mt-4">
            <a href="#" class="text-decoration-none text-center fs-5" style="color: #502779"><u>Alterar senha</u></a>
            <a href="#" class="text-decoration-none text-center fs-5" style="color: #502779"><u>Meus anúncios</u></a>
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
