
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons CSS (opcional, para ícones) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="estilo.css">
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-estilo" id="navbar">
    <div class="container-fluid">

      <a class="navbar-brand" href="#">
        <img src="../navbar/header.png" alt="Logo da Empresa" height="50" style= "margin-left: 4rem">
      </a>
        
        
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../home/home.php" style="color: white; margin-right: 2rem">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../sobre/sobre.php" style="color: #dabbf8; margin-right: 2rem">Sobre nós</a>
          </li>

          <!--<li class="nav-item">
            <a class="nav-link active" href="../produto/produto.php" style="color: white">Produtos</a>
          </li>-->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
              Empresas
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="../pesquisa/pesquisaEmpresa.php">Buscar - Vendedores e Empresas Parceiras</a></li>
            </ul>
          </li>
        </ul>

        <form class="d-flex" action="../home/home.php">
          <input class="form-control me-2" id = "campoPesquisa" name = "campoPesquisa" type="search" placeholder="Pesquisar uma peça" aria-label="Pesquisar" style="width: 400px;">
          <button class="btn btn-outline-light" id="btnPesquisa" name="btnPesquisa" type="button"><i class="bi bi-search"></i></button>
        </form>

        <a class="nav-link text-light ms-3" href="#"><i class="bi bi-cart3 fs-3"></i></a>

        <div class="dropdown ms-3 p-4" style = "margin-right: 5rem;">
          <a class="button-person nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-3"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="../perfis/cliente.php">Meu Perfil</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">Sair</a></li>
          </ul>
          

        </div>

      </div>
    </div>
  </nav>

  <?php

    // Verifica se há uma mensagem de erro passada via GET
    $mensagemLogout = '';

    if(isset($_GET["msgLogout"])){
      $mensagemLogout = $_GET["msgLogout"];
    }
  ?>

  <!--Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Confirmação de Saída</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="logoutMessage">Deseja sair do seu login no sistema?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="../../control/login/logout.php" class="btn btn-primary">Sair</a>
      </div>
    </div>
  </div>
  </div>

  <?php 

    if (!empty($mensagemLogout)) {

        // Exibe o modal se houver uma mensagem de erro
        echo '<script type="text/javascript">
                    window.onload = function() {
                        console.log("modal");
                        var modalLogout = new bootstrap.Modal(document.getElementById("logoutModal"));
                        modalLogout.show();
                    }
                </script>';

        // Redireciona para a mesma página sem o parâmetro `msg` após mostrar o modal
        echo '<script type="text/javascript">
                window.onload = function() {
                    var modalLogout = new bootstrap.Modal(document.getElementById("logoutModal"));
                    modalLogout.show();
                    history.replaceState(null, "", window.location.href.split("?")[0]);
                }
            </script>';
    }

  ?>


<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>