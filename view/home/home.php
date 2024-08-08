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
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  
</head>
<body>

<?php
require_once "../navbar/navbar.php";
?>


<!--Página-->
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

<!-- Seção de Categorias -->
<div style="display: flex; justify-content: center;">
<div class="ms-5 me-5 mt-5" style="width: 80%;">
  <h2 class="mb-4 h2">Categoria 1</h2>
  
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <img src="https://zh.rbsdirect.com.br/imagesrc/21718277.jpg?w=700" class="card-img-top" alt="Produto 1">
              <div class="card-body">
                <h5 class="card-title">Produto 1</h5>
                <p class="price">R$ 100,00</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <img src="https://http2.mlstatic.com/D_NQ_NP_702635-MLB49142278395_022022-O.webp" class="card-img-top" alt="Produto 2">
              <div class="card-body">
                <h5 class="card-title">Produto 2</h5>
                <p class="price">R$ 200,00</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <img src="https://tm.ibxk.com.br/materias/9709/40192.jpg" class="card-img-top" alt="Produto 3">
              <div class="card-body">
                <h5 class="card-title">Produto 3</h5>
                <p class="price">R$ 300,00</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <img src="https://tm.ibxk.com.br/materias/9709/40192.jpg" class="card-img-top" alt="Produto 3">
              <div class="card-body">
                <h5 class="card-title">Produto 3</h5>
                <p class="price">R$ 300,00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Seção de Categorias -->
<div style="display: flex; justify-content: center;">
  <div class="ms-5 me-5 mt-5" style="width: 80%;">
    <h2 class="mb-4">Categoria 2</h2>
    
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <img src="https://zh.rbsdirect.com.br/imagesrc/21718277.jpg?w=700" class="card-img-top" alt="Produto 1">
                <div class="card-body">
                  <h5 class="card-title">Produto 1</h5>
                  <p class="price">R$ 100,00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <img src="https://http2.mlstatic.com/D_NQ_NP_702635-MLB49142278395_022022-O.webp" class="card-img-top" alt="Produto 2">
                <div class="card-body">
                  <h5 class="card-title">Produto 2</h5>
                  <p class="price">R$ 200,00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <img src="https://tm.ibxk.com.br/materias/9709/40192.jpg" class="card-img-top" alt="Produto 3">
                <div class="card-body">
                  <h5 class="card-title">Produto 3</h5>
                  <p class="price">R$ 300,00</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <img src="https://tm.ibxk.com.br/materias/9709/40192.jpg" class="card-img-top" alt="Produto 3">
                <div class="card-body">
                  <h5 class="card-title">Produto 3</h5>
                  <p class="price">R$ 300,00</p>
                </div>
              </div>
            </div>
          </div>
        </div>
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



</body>
</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
