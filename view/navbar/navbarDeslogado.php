
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
    
  <nav class="navbar navbar-expand-lg navbar-estilo Deslog" id="navbar">
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

            <a class="nav-link text-light ms-3" href="../carrinho/carrinho.php"><i class="bi bi-cart3 fs-3"></i></a>

            <div class="dropdown ms-3 p-4" style = "margin-right: 5rem;">
              <a class="button-person nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-3"></i>
              </a>

              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="../login/login.php">Login</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="../cadastro/cadastro.php">Registre-se</a></li>
              </ul>
              

            </div>

          </div>
        </div>
      </nav>

  <!--<nav class="navbar navbar-expand-lg navbar-dark navbar-estilo">
    <div class="container">


      <div class="nav-logo">
          Logo da empresa 
        <a class="navbar-brand" href="#">
          <img src="../navbar/header.png" alt="Logo da Empresa" height="50">
        </a>
        <ul class="navbar-nav me-auto">
          
          <li class="nav-item">
            <a class="nav-link active" href="../produto/produto.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produtos</a>
          </li>
          
        </ul>
      </div>


       Botão que aparece quando a navbar é colapsada 

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


       Itens da navbar 

      <div class="collapse navbar-collapse" id="navbarNav">


         Formulário de pesquisa 

        <form class="d-flex">
          
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width: 500px;">
          <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
        </form>


         Ícone de carrinho 

        <a class="nav-link text-light ms-3" href="#"><i class="bi bi-cart3 fs-3"></i></a>


         Foto de perfil 

        <div class="dropdown ms-3 p-4">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            i class="bi bi-person-circle fs-3"></i>
          </a>

          <div class="dropdown-menu">
            <form class="px-4 py-3" id="dropdown">
              <div class="form-group mb-3">
                <label for="exampleDropdownFormEmail1">Email</label>
                <<input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
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
  </nav> -->

    <!-- Segunda Navbar -->
      </div>
<body>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>