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
  <link rel="stylesheet" href="produto.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  
</head>
<body>

<?php
require_once "../navbar/navbar.php";
?>


<!--Página-->
<div class="container mt-5">
        <h1>ANUNCIAR PRODUTO</h1>
        <form>
            <div class="row mb-3 mt-3">
                <div class="col-md-8">
                    <label class="form-label"><b>Condição</b></label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicao" id="novo" value="novo">
                        <label class="form-check-label" for="novo">Novo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicao" id="usado" value="usado">
                        <label class="form-check-label" for="usado">Usado</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="anoLancamento" class="form-label"><b>Ano de lançamento</b></label>
                    <input type="text" class="form-control" id="anoLancamento">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="descricao" class="form-label"><b>Descrição da peça</b></label>
                    <input type="text" class="form-control" id="descricao">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="categoria" class="form-label"><b>Categoria</b></label>
                    <input type="text" class="form-control" id="categoria">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="preco" class="form-label"><b>Preço</b></label>
                    <input type="text" class="form-control" id="preco">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="status" class="form-label"><b>Status</b></label>
                    <input type="text" class="form-control" id="status">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="imagem" class="form-label"><b>Adicionar imagem</b></label>
                    
                    <input type="file" class="form-control" id="imageUpload">

                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary w-100" style="backgroun-color: #502779">Avançar</button>
                </div>
                
            </div>
        </form>
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
