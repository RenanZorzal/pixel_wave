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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap Icons CSS (opcional, para ícones) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="homeStyle.css">
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

    require_once "../../control/login/validarSessao.php";

    $tipoSessao = validarSessao(false, false, true); // Valida a sessão e retorna o tipo

    if ($tipoSessao == 'cliente') { // Verifica se é CLIENTE
        require_once "../navbar/navbarCliente.php";

    } elseif ($tipoSessao == 'vendedor' || $tipoSessao == 'empresa') { // Verifica se é VENDEDOR ou EMPRESA
        require_once "../navbar/navbarVendEmp.php";

    } else { // DESLOGADO
        require_once "../navbar/navbarDeslogado.php";
    }

    if(isset($_GET['msgDeslog'])) {
      $mensagemDeslog = urldecode($_GET['msgDeslog']);
      //$_SESSION['message'] = $mensagemDeslog; //Armazenando a mensagem na sessão para uso posterior
    }

    if(isset($_GET['msgVendedor'])) {
      $mensagemVendedor = urldecode($_GET['msgVendedor']);
      //$_SESSION['message'] = $mensagemDeslog; //Armazenando a mensagem na sessão para uso posterior
    }

  ?>


<!--Página-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-thin">
      <div class="container-fluid justify-content-center">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="departmentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-list"></i> Departamentos
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="departmentsDropdown" style="position: absolute; z-index: 1000">
                    <?php
                      require "../../model/categoriaDAO.php";
                      $resultado = pesquisarPorCategoria();  
                      while ($registro = mysqli_fetch_assoc($resultado)) {        
                        $idCategoria = $registro["idCategoria"];
                        $categoria = $registro["nomeCategoria"];    
                        echo "<li class='li-categ'>
                          <a class='dropdown-item dropdown-cat categ' href='$idCategoria' style='color: black'>$categoria</a>
                          <ul class='dropdown-menu dropdown-subcategoria' aria-labelledby='navbarDropdown' style='right: 0; z-index: 1001'>";

                          require_once "../../model/categoriaDAO.php";
                          $resultadoSub = pesquisarPorSubcategoria($idCategoria);

                          while ($registroSub = mysqli_fetch_assoc($resultadoSub)) {
                            $idSubcategoria = $registroSub["idSubcategoria"];
                            $nomeSubcategoria = $registroSub["nomeSubcategoria"];

                            echo "<li> 
                              <a class='dropdown-item subcateg' href='$idSubcategoria' style='color: black'>$nomeSubcategoria</a>
                              </li>";
                          }

                          echo "</ul>
                        </li>";
                      }
                    ?>
                  </ul>
              </li>
              <!-- Outros links de categorias -->
              <li class="nav-item">
                  <a class="nav-link" href="#">Ofertas</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Lançamentos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Mais Vendidos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Atendimento</a>
              </li>
          </ul>
      </div>
    </nav>
    

    <!-- Carousel de Destaques -->
    <div id="highlightCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#highlightCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#highlightCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#highlightCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#highlightCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#highlightCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://img.terabyteshop.com.br/banner/2778.jpg" class="d-block w-100" alt="Produto 1">

            </div>
            <div class="carousel-item">
                <img src="https://img.terabyteshop.com.br/banner/2882.jpg" class="d-block w-100" alt="Produto 2">
            </div>
            <div class="carousel-item">
                <img src="https://img.terabyteshop.com.br/banner/2947.jpg" class="d-block w-100" alt="Produto 3">
            </div>
            <div class="carousel-item">
                <img src="https://img.terabyteshop.com.br/banner/2432.jpg" class="d-block w-100" alt="Produto 4">

            </div>
            <div class="carousel-item">
                <img src="https://img.terabyteshop.com.br/banner/2972.jpg" class="d-block w-100" alt="Produto 5">

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#highlightCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#highlightCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

  <nav id="dark-nav" class="navbar navbar-expand-lg navbar-dark bg-dark navbar-thin"></nav>
    

<!-- Seção de Produtos -->
 
  <div style="display: flex; justify-content: center;">
    <div class="ms-5 me-5 mt-5 main" id="section-resultado">
      <!--<h2 class="mb-4 h3">Em destaque:</h2>-->

            <div class="div-logo">
              <img src="catalogo-produtos.png" alt="Produtos">
            </div>
      
            <div class="row div-resultado" id = "resultado-pecas">


            </div>
    </div>
  </div>

  <?php
    require_once "../footer/footer.php";

  ?>

<!--Suporte-->
<div class="dropup" style="position: fixed; bottom: 20px; right: 30px;">
  <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-chat-right-fill custom"></i>
  </button>
  <ul class="dropdown-menu p-3" style="width: 400px;"> <!-- Adiciona padding p-3 para espaçamento interno -->
    <!-- Dropdown menu links -->
    <div class="form-group">
      <label for="exampleDropdownFormName">Nome</label>
      <input type="text" class="form-control" id="exampleDropdownFormName" placeholder="Seu nome">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormEmail">Email</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail" placeholder="email@example.com">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormQuestion">Dúvida</label>
      <textarea class="form-control" id="exampleDropdownFormQuestion" rows="5" placeholder="Sua dúvida"></textarea>
    </div>
  </ul>
</div>

<!--Modal-->

<div class="modal fade" id="modalDeslog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel" class="modal-title">ATENÇÃO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if(isset($mensagemDeslog)) { echo $mensagemDeslog; } ?>
      </div>
      <div class="modal-footer">
        <a href="../login/login.php" class="botao">Fazer Login</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalVendedor" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel" class="modal-title">ATENÇÃO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if(isset($mensagemVendedor)) { echo $mensagemVendedor; } ?>
        <br>
        <br>
        <p>Deseja ser um cliente? Crie agora sua conta Cliente em nosso site, na aba 'Cadastre-se'!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    if (<?php echo isset($mensagemDeslog) ? 'true' : 'false'; ?>) {
      $('#modalDeslog').modal('show'); // Abre o modal 'modalDeslog' (atualize o ID se necessário)
    }

    $('#modalDeslog').on('hidden.bs.modal', function (e) {
      window.location.href = window.location.origin + window.location.pathname;
    });
  });

  $(document).ready(function() {
    if (<?php echo isset($mensagemVendedor) ? 'true' : 'false'; ?>) {
      $('#modalVendedor').modal('show'); // Abre o modal 'modalDeslog' (atualize o ID se necessário)
    }

    $('#modalVendedor').on('hidden.bs.modal', function (e) {
      window.location.href = window.location.origin + window.location.pathname;
    });
  });
</script>

<script src="appHome.js"></script>

</body>
</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->

</body>
</html>
