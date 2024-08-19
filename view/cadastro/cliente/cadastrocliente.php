<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="cliente.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="body2">
    <div class="esquerdo">
        <div class="cima d-flex justify-content-center align-items-center">
            <img src="header.png" alt="" style="max-width: 100%">
        </div>
        <div class="baixo d-flex justify-content-center align-items-center">
          <div class="container-fluid">
              <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-md-6">
        
                      <div>
                          <form>
                              <div class="mb-3">
                                  <label for="nome" class="form-label">Nome</label>
                                  <input type="text" class="form-control form-control-lg" id="nome-empresa" placeholder="">
                              </div>
      
                              <div class="mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                              </div>
                          
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="cpf" class="form-label">CPF</label>
                                      <input type="text" class="form-control form-control-lg" id="cnpj" placeholder="">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="datanascimento" class="form-label">Data de Nascimento</label>
                                      <input type="date" class="form-control form-control-lg" id="data-abertura" placeholder="">
                                  </div>
                              </div>
      
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="genero" class="form-label">Genêro</label>
                                      
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                    <option>Prefiro não informar</option>
                                </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="celular" class="form-label">Celular</label>
                                      <input type="text" class="form-control form-control-lg" id="celular" placeholder="">
                                  </div>
                              </div>
      
      
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="senha1" class="form-label">Senha</label>
                                      <input type="password" class="form-control form-control-lg" id="senha" placeholder="Digite sua senha">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="senha2" class="form-label">Confirmação de senha</label>
                                      <input type="password" class="form-control form-control-lg" id="confirmacao-senha" placeholder="Confirme sua senha">
                                  </div>
                              </div>
      
                              <div class="mb-3 form-check">
                                  <input type="checkbox" class="form-check-input" id="terms">
                                  <label class="form-check-label" for="terms">Concordo com os termos</label>
                              </div>
      
                              <div class="d-flex justify-content-between">
                                  <button type="button" class="btn btn-light">Voltar</button>
                                  <button type="submit" class="btn btn-primary">Enviar</button>
                              </div>
                          </form>
                      </div>
                  </div>
    </div>
    </div>
    </div>
  </div>
    <div class="direito">
        <img src="arte.png" alt="" style="width: 100%; height: 100%; max-width: 100%;" class=img-fluid>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</html>