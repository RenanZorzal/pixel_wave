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
    
  <nav class="navbar navbar-expand-lg navbar-dark navbar-estilo">
    <div class="container">

      <!-- Logo da empresa -->

      <a class="navbar-brand" href="#">
        <img src="../navbar/logo.png" alt="Logo da Empresa" height="50">
      </a>


      <!-- Botão que aparece quando a navbar é colapsada -->

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <!-- Itens da navbar -->

      <div class="collapse navbar-collapse" id="navbarNav">
        
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">PIXEL WAVE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="../produto/produto.php">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sobre Nós</a>
          </li>
        </ul>


        <!-- Formulário de pesquisa -->

        <form class="d-flex">
          
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width: 500px;">
          <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>


        <!-- Ícone de carrinho -->

        <a class="nav-link text-light ms-3" href="#"><i class="bi bi-cart3 fs-3"></i></a>


        <!-- Foto de perfil -->

        <div class="dropdown ms-3 p-4">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-3"></i>
          </a>

          <div class="dropdown-menu">
            <form class="px-4 py-3" id="dropdown">
              <div class="form-group mb-3">
                <label for="exampleDropdownFormEmail1">Email</label>
                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
              </div>
              <div class="form-group mb-3">
                <label for="exampleDropdownFormPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha">
              </div>
              <div class="mb-3 form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                  <label class="form-check-label" for="dropdownCheck2">
                    Lembre-me
                  </label>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Entrar</button>
            </form>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item nav-link" aria-current="page" href="../cadastro/cadastro.php">Novo por aqui? Registre-se</a>
              <a class="dropdown-item" href="#">Esqueci minha senha</a>
        </div>

      </div>
    </div>
  </nav>

    <!-- Segunda Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-thin">
      <div class="container-fluid justify-content-center">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="departmentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-list"></i> Departamentos
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="departmentsDropdown">
                      <li><a class="dropdown-item" href="#">Processadores</a></li>
                      <li><a class="dropdown-item" href="#">Placas Mãe</a></li>
                      <li><a class="dropdown-item" href="#">Memórias RAM</a></li>
                      <li><a class="dropdown-item" href="#">Placas de Vídeo</a></li>
                      <li><a class="dropdown-item" href="#">Armazenamento</a></li>
                      <li><a class="dropdown-item" href="#">Fontes</a></li>
                      <li><a class="dropdown-item" href="#">Gabinetes</a></li>
                      <li><a class="dropdown-item" href="#">Coolers</a></li>
                      <li><a class="dropdown-item" href="#">Periféricos</a></li>
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
      </div>
<body>
</body>
</html>