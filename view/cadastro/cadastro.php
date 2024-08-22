<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastre-se</title>
        <link rel="stylesheet" href="cadastro.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons CSS (opcional, para ícones) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        
    </head>
    <body class="body2">
        <div class="esquerdo">
            <div class="cima d-flex align-items-end" style="margin-left: 10%;">
                <img src="header.png" alt="">
            </div>

            <div style="margin-top: 2%; height: 8%" class="d-flex justify-content-center align-items-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="formDiv1" onchange="mostrarForm()">
                    <label class="form-check-label" for="inlineRadio1">Vendedor Autonômo</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="formDiv2" onchange="mostrarForm()" >
                    <label class="form-check-label" for="inlineRadio2">Empresa</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="formDiv3" onchange="mostrarForm()" >
                    <label class="form-check-label" for="inlineRadio3">Cliente</label>
                </div>

            </div>

            <div class="baixo d-flex justify-content-center align-items-center">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div id="formDiv1">
                            <form>
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
                                <form>

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

                                    <div class="d-flex justify-content-between mb-4">
                                        <button type="submit" class="btn btn-primary" id="enviar" >Enviar</button>
                                        <button type="button" class="btn btn-light" id="voltar" >Voltar</button>
                                    </div>
                                </form>
                        </div>

                        <div id="formDiv3">
                            <form>
                              <div class="mb-3">
                                  <label for="nome" class="form-label">Nome Completo</label>
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
                                      <input type="date" class="form-control form-control-lg" id="data-nascimento" placeholder="">
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
                                  <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                                  <button type="button" class="btn btn-light" id="voltar">Voltar</button>
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
        
        <script>
            function mostrarForm() {
                // Esconder todos os formulários
                document.getElementById("formDiv1").style.display = "none";
                document.getElementById("formDiv2").style.display = "none";
                document.getElementById("formDiv3").style.display = "none";

                // Obter o valor do radio button selecionado
                var radios = document.getElementsByName("inlineRadioOptions");

                if(radios[0].checked){
                     //o value deve ser o mesmo id da div a que corresponde
                    document.getElementById(radios[0].value).style.display = "block";

                } else if(radios[1].checked){
                    document.getElementById(radios[1].value).style.display = "block";

                } else{
                    document.getElementById(radios[2].value).style.display = "block";
                }
            }

         </script>



    </body>

</html>