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
  <link rel="stylesheet" href="styleHome.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <link rel="stylesheet" href="../footer/footer-style.css">  
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
    

                    <!--aqui-->
                    <div class="text-center p-5 shadow-sm bg-white rounded">
        <div class="success-icon mb-4">
            <i class="bi bi-check-circle"></i>
        </div>
        <h3 class="mb-3 text-success">Venda Concluída com Sucesso!</h3>
        <p class="message">Sua compra foi finalizada com sucesso. Você receberá um e-mail com os detalhes da sua compra.</p>
        <a href="home.php" class="btn btn-dark mt-4">Voltar para a Página Inicial</a>
    </div>




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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="app.js"></script>

</body>
</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->

</body>
</html>
