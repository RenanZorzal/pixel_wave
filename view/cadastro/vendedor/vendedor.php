<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
     <link rel="stylesheet" href="vendedor.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
</head>
<body class="body2">
    <div class="esquerdo">
        <div class="cima d-flex align-items-end" style="margin-left: 20%;">
            <img src="header.png" alt="">
        </div>

        <div style="margin-top: 2%; height: 1px" class="cima d-flex justify-content-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="vendedor1" value="1">
                <label class="form-check-label" for="vendedor1">Vendedor Autonômo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="vendedor2" value="2">
                <label class="form-check-label" for="vendedor2">Empresa</label>
            </div>
        </div>

        <div class="baixo d-flex justify-content-center align-items-center">
          <div class="container-fluid">
              <div class="row d-flex justify-content-center align-items-center">
                  <div class="col-md-6">
                      <div id="formDiv1">
                          <form style="display: none">
                              <div class="mb-3">
                                  <label for="nome-vendedor" class="form-label">Nome Completo</label>
                                  <input type="text" class="form-control form-control-lg" id="nome-vendedor" placeholder="">
                              </div>
      
                              <div class="mb-3">
                                  <label for="email-vendedor" class="form-label">Email</label>
                                  <input type="email" class="form-control form-control-lg" id="email-vendedor" placeholder="">
                              </div>
                          
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="cpf-vendedor" class="form-label">CPF</label>
                                      <input type="text" class="form-control form-control-lg" id="cpf-vendedor" placeholder="">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="data-nascimento" class="form-label">Data de Nascimento</label>
                                      <input type="date" class="form-control form-control-lg" id="data-nascimento" placeholder="">
                                  </div>
                              </div>
      
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="telefone" class="form-label">Telefone</label>
                                      <input type="text" class="form-control form-control-lg" id="telefone" placeholder="">
                                  </div>
                              </div>
      
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="senha" class="form-label">Senha</label>
                                      <input type="password" class="form-control form-control-lg" id="senha" placeholder="Digite sua senha">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="confirmacao-senha" class="form-label">Confirmação de senha</label>
                                      <input type="password" class="form-control form-control-lg" id="confirmacao-senha" placeholder="Confirme sua senha">
                                  </div>
                              </div>
      
                              <div class="mb-4 form-check">
                                  <input type="checkbox" class="form-check-input" id="terms">
                                  <label class="form-check-label" for="terms">Concordo com os termos</label>
                              </div>
      
                              <div class="d-flex justify-content-between">
                                  <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                                  <button type="button" class="btn btn-light" id="voltar">Voltar</button>
                              </div>
                          </form>
                      </div>

                      <div id="formDiv2">
                            <form style="display: none">

                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" name="tipo-vendedor" id="vendedor2" value="2">
                                    <label class="form-check-label" for="vendedor2">Empresa</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                <label for="nome-empresa" class="form-label">Nome da Empresa</label>
                                <input type="text" class="form-control form-control-lg" id="nome-empresa" placeholder="">
                                </div>

                                <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cnpj" class="form-label">CNPJ</label>
                                    <input type="text" class="form-control form-control-lg" id="cnpj" placeholder="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="data-abertura" class="form-label">Data de Abertura</label>
                                    <input type="date" class="form-control form-control-lg" id="data-abertura" placeholder="">
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="text" class="form-control form-control-lg" id="telefone" placeholder="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control form-control-lg" id="celular" placeholder="">
                                </div>
                                </div>

                                <div class="mb-3">
                                <label for="razao-social" class="form-label">Razão Social</label>
                                <input type="text" class="form-control form-control-lg" id="razao-social" placeholder="">
                                </div>

                                <div class="mb-3">
                                <label for="inscricao-estadual" class="form-label">Inscrição Estadual</label>
                                <input type="text" class="form-control form-control-lg" id="inscricao-estadual" placeholder="">
                                </div>

                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" class="form-control form-control-lg" id="senha" placeholder="Digite sua senha">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmacao-senha" class="form-label">Confirmação de senha</label>
                                    <input type="password" class="form-control form-control-lg" id="confirmacao-senha" placeholder="Confirme sua senha">
                                </div>
                                </div>

                                <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms">
                                <label class="form-check-label" for="terms">Concordo com os termos</label>
                                </div>

                                <div class="d-flex justify-content-between mb-5">
                                <button type="submit" class="btn btn-primary" style="background-color: #4ABFB2; border-color: #3BA99C; width: 30%" >Enviar</button>
                                <button type="button" class="btn btn-light" style="background-color: #C1ECE7; border-color: #C1ECE7;" >Voltar</button>
                                </div>
                            </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="direito">
        <img src="arte.png" alt="" style="width: 100%; height: 100vh;" class=img-fluid>
    </div>
    


</html>