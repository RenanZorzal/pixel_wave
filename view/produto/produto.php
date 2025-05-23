<?php
session_start();
?>
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
  <link rel="stylesheet" href="styleProduto.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>
<body>

<?php
require_once "../navbar/navbarVendEmp.php";
?>

  <header>
      <div class="voltar">
          <a href="menu.php">
              <img src="button-voltar.png" alt="" class="botaoVoltar">
          </a>
          <a href="menu.php">
              <h6>Voltar</h6>
          </a>
      </div>
  </header>

<!--Página-->
<div class="container mt-5">
  <h1>ANUNCIAR PRODUTO</h1>
  <form method="post" name="formProduto" action="../../control/produto/cadProduto.php" enctype="multipart/form-data">
    <div class="row mb-3">
      <div class="col-md-8">
        <label for="nome" class="form-label"><b>Nome</b></label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>
    </div>
    <div class="row mb-3 mt-3">
      <div class="col-md-8">
        <label class="form-label"><b>Condição</b></label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="condicao" id="novo" value="nova" required>
          <label class="form-check-label" for="novo">Novo</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="condicao" id="usado" value="usada">
          <label class="form-check-label" for="usado">Usado</label>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-8">
        <label for="anoLancamento" class="form-label"><b>Ano de lançamento</b></label>
        <input type="number" class="form-control" id="anoLancamento" name="anoLancamento">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-8">
        <label for="descricao" class="form-label"><b>Descrição da peça</b></label>
        <input type="text" class="form-control" id="descricao" name="descricao">
      </div>
    </div>
    
    <div class="row mb-3">
  <div class="col-md-8">
    <label for="categoria" class="form-label"><b>Categoria</b></label>
    <select class="form-control" id="categoria" name="categoria" onchange="carregarSubcategorias(this.value)">
      <option>Selecione uma categoria</option>
      <?php
        require "../../model/categoriaDAO.php";
        $options = carregarComboCategoria($categoria);              
        echo $options;
      ?>
    </select>
  </div>
</div>
<div class="row mb-3">
  <div class="col-md-8">
    <label for="subcategoria" class="form-label"><b>Sub-Categoria</b></label>
    <select class="form-control" id="subcategoria" name="subcategoria">
      <!-- Subcategorias serão carregadas aqui via AJAX -->
    </select>
  </div>
</div>

<script>
  function carregarSubcategorias(categoriaId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../../control/produto/carregar_subcategorias.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("subcategoria").innerHTML = xhr.responseText;
      }
    };
    xhr.send("categoria=" + categoriaId);
  }
</script>

    <div class="row mb-3">
      <div class="col-md-8">
        <label for="preco" class="form-label"><b>Preço</b></label>
        <input type="number" class="form-control" id="preco" name="preco">
      </div>
    </div>

    <div class="row mb-3 mt-3">
      <div class="col-md-8">
        <label class="form-label"><b>Status</b></label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="sestoque" value="Sem estoque">
          <label class="form-check-label" for="sestoque">Sem estoque</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="ind" value="disponível">
          <label class="form-check-label" for="ind">Em estoque</label>
        </div>
        
        <!-- Campo para inserir a quantidade -->
        <div id="quantidade-campo" class="mt-3">
          <label for="quantidade" class="form-label"><b>Quantidade</b></label>
          <input type="number" id="quantidade" class="form-control" name="quantidade" placeholder="Digite a quantidade">
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-8">
        <label for="arquivo" class="form-label"><b>Adicionar imagem</b></label>
        <input type="file" class="form-control" id="arquivo" name="arquivo">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-8">
        <button type="submit" class="botao btn btn-primary w-100" style="background-color: #502779; border-color:#502779 ">Avançar</button>
      </div>
    </div>
  </form> 
</div>

<?php
    // Verifica se há uma mensagem de erro passada via GET
    $mensagemErro = '';

    if(isset($_GET["msgErro"])){
        $mensagemErro = $_GET["msgErro"];
    }
  ?>

  <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: #FF6565; font-weight: bold">Feedback de Alteração</h5>
                </div>
                <div class="modal-body">
                    <?php if (!empty($mensagemErro)) {  // Verifica se tem mensagem de ERRO
                        echo "<FONT color=#FF6565>$mensagemErro</FONT>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
          
  if (!empty($mensagemErro)) {

      // Exibe o modal se houver uma mensagem de erro
      echo '<script type="text/javascript">
                  window.onload = function() {
                      var errorModal = new bootstrap.Modal(document.getElementById("errorModal"));
                      errorModal.show();
                  }
              </script>';

      // Redireciona para a mesma página sem o parâmetro `msg` após mostrar o modal
      echo '<script type="text/javascript">
              window.onload = function() {
                  var errorModal = new bootstrap.Modal(document.getElementById("errorModal"));
                  errorModal.show();
                  history.replaceState(null, "", window.location.href.split("?")[0]);
              }
          </script>';
  }

?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
