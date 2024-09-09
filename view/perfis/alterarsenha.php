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
require_once "../navbar/navbar.php";
?>

<div class="d-flex justify-content-center align-items-center">
<!--Página-->

    
<div class="mt-5">
<div class="d-flex justify-content-center align-items-center">

<h1 style="color: #502779"><b>ALTERAR SENHA</b></h1>
</div>
<div class="container form-container">
    <form>
        <div>
            <div >
                <label for="nome" class="form-label">Nova senha</label>
                <input type="text" class="form-control shadow-box" id="nome" placeholder="">
            </div>
            <div>
                <label for="email" class="form-label">Confirmar senha</label>
                <input type="email" class="form-control shadow-box" id="email" placeholder="">
                
            </div>
           
        
        <div class="mt-4 d-flex justify-content-center">
            <button type="button" class="btn justify-content-center fs-5" style="background-color:#502779; color:white">Salvar alterações</button>
 
        </div>

    </form>

</div>
</div>
</div>

</body>
</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
