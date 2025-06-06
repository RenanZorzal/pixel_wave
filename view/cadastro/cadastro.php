<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastre-se</title>
        <link rel="stylesheet" href="styleCadastro.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons CSS (opcional, para ícones) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
    </head>
    <body class="body2">

        <?php
            $mensagem = ''; //ceta a msg de erro como vazia ao início do arquivo
        ?>


        <div class="esquerdo">

            <div class="div-botao">
                <img src="button-voltar.png" alt="Botão de Voltar" class="botao">
            </div>

            <div class="cima d-flex align-items-end" style="margin-left: 10%;">
                <img src="header.png" alt="">
            </div>

            <div class="div-logoCad">
                <img src="logo-cadastro.png" alt="" class="logo-cadastro">
            </div>

            <div style="margin-top: 2%; height: 8%" class="radios">
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

            <!--Vendedor autonomo-->
            <div class="baixo d-flex justify-content-center">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div id="formDiv1" style="display: none"> 
                            <form method="post" name="formVendedor" action="../../control/cadastro/vendedor/cadVendedor.php" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nomeVendedor" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control form-control-lg" name="nomeVendedor" id="nomeVendedor" placeholder="" required>
                                </div>
        
                                <div class="mb-3">
                                    <label for="emailVendedor" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-lg" name="emailVendedor" id="emailVendedor" placeholder="" required>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cpfVendedor" class="form-label cpf">CPF</label>
                                        <input type="text" class="form-control form-control-lg" name="cpfVendedor" id="cpfVendedor" placeholder="" maxlength="11" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dataNascimento" class="form-label" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>">Data de Nascimento</label>
                                        <input type="date" class="form-control form-control-lg" name="dataNascimento" id="dataNascimento" placeholder="" required>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="telefone" class="form-label">Telefone</label>
                                        <input type="tel" class="form-control form-control-lg" name="telefone" id="telefone" placeholder="" onkeyup="handlePhone(event)" oninput="contarCaracteres()" maxlength="15" required>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control form-control-lg" name="senha" id="senha" placeholder="Digite sua senha" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="confirmacaoSenha" class="form-label">Confirmação de senha</label>
                                        <input type="password" class="form-control form-control-lg" name="confirmacaoSenha" id="confirmacaoSenha" placeholder="Confirme sua senha" required>
                                    </div>
                                </div>
        
                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" name="termos" id="termos" required>
                                    <label class="form-check-label" for="termos">Concordo com os termos</label>
                                </div>
        
                                <div class="d-flex justify-content-between">
                                    <!-- <button type="submit" class="btn btn-primary" id="enviar" data-bs-toggle="modal" data-bs-target="#modalFeedback">Enviar</button> -->
                                    <!--<a href="#" data-bs-toggle="modal" data-bs-target="#modalFeedback" class="btn" id="enviar">Enviar</a>-->
                                    <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                                    <a href="../home/home.php" class="btn" id="voltar">Voltar</a>
                                </div>
                            </form>
                        </div>

                        <!--Empresa-->
                        <div id="formDiv2">
                                <form method="post" name="formEmpresa" action="../../control/cadastro/empresa/cadEmpresa.php" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <label for="nomeEmpresa" class="form-label">Nome da Empresa</label>
                                        <input type="text" class="form-control form-control-lg" name="nomeEmpresa" id="nomeEmpresa" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="cnpj" class="form-label cnpj">CNPJ</label>
                                            <input type="text" class="form-control form-control-lg" name="cnpj" id="cnpj" placeholder="" maxlength="14" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="dataAbertura" class="form-label">Data de Abertura</label>
                                            <input type="date" class="form-control form-control-lg" name="dataAbertura" id="dataAbertura" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telefone" class="form-label">Telefone</label>
                                            <input type="tel" class="form-control form-control-lg" name="telefone" id="telefone" placeholder="" onkeyup="handlePhone(event)" maxlength="15" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="celular" class="form-label">Celular</label>
                                            <input type="text" class="form-control form-control-lg" name="celular" id="celular" placeholder="" onkeyup="handlePhone(event)" maxlength="15" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="razaoSocial" class="form-label">Razão Social</label>
                                        <input type="text" class="form-control form-control-lg" name="razaoSocial" id="razaoSocial" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="inscricaoEstadual" class="form-label">Inscrição Estadual</label>
                                        <input type="text" class="form-control form-control-lg" name="inscricaoEstadual" id="inscricaoEstadual" placeholder="" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="senha" class="form-label">Senha</label>
                                            <input type="password" class="form-control form-control-lg" name="senha" id="senha" placeholder="Digite sua senha" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="confirmacaoSenha" class="form-label">Confirmação de senha</label>
                                            <input type="password" class="form-control form-control-lg" name="confirmacaoSenha" id="confirmacaoSenha" placeholder="Confirme sua senha" required>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-check">
                                        <input type="checkbox" class="form-check-input" id="termos" name="termos" required>
                                        <label class="form-check-label" for="termos">Concordo com os termos</label>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <!-- <button type="submit" class="btn btn-primary" id="enviar" data-bs-toggle="modal" data-bs-target="#modalFeedback">Enviar</button> -->
                                        <!--<a href="#" data-bs-toggle="modal" data-bs-target="#modalFeedback" class="btn" id="enviar">Enviar</a>-->
                                        <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                                        <a href="../home/home.php" class="btn" id="voltar">Voltar</a>
                                    </div>
                                </form>
                        </div>

                        <!--Cliente-->
                        <div id="formDiv3">
                            <form method="post" name="formCliente" action="../../control/cadastro/cliente/cadCliente.php" enctype="multipart/form-data">
                              <div class="mb-3">
                                  <label for="nomeCliente" class="form-label">Nome Completo</label>
                                  <input type="text" class="form-control form-control-lg" id="nomeCliente" name="nomeCliente" placeholder="" required>
                              </div>
      
                              <div class="mb-3">
                                  <label for="emailCliente" class="form-label">Email</label>
                                  <input type="email" class="form-control form-control-lg" id="emailCliente" name="emailCliente" placeholder="" required>
                              </div>
                          
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="cpfCliente" class="form-label cpf">CPF</label>
                                      <input type="text" class="form-control form-control-lg" id="cpfCliente" name="cpfCliente" placeholder="" maxlength="11" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="dtNascCliente" class="form-label">Data de Nascimento</label>
                                      <input type="date" class="form-control form-control-lg" id="dtNascCliente" name="dtNascCliente" placeholder="" max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" required>
                                  </div>
                              </div>
      <!--
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="sexoCliente" class="form-label">Genêro</label>
                                      
                                <select class="form-control form-control-lg" id="sexoCliente" name="sexoCliente">
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                    <option>Prefiro não informar</option>
                                </select>
                                  </div>
                                  
                              </div>
      -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                      <label for="telefoneCliente" class="form-label">Celular</label>
                                      <input type="tel" class="form-control form-control-lg" id="telefoneCliente" name="telefoneCliente" maxlength="15" placeholder="" onkeyup="handlePhone(event)" required>
                                    </div>
                                </div>
      
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label for="senha1Cliente" class="form-label">Senha</label>
                                      <input type="password" class="form-control form-control-lg" id="senha1Cliente" name="senha1Cliente" placeholder="Digite sua senha" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="senha2Cliente" class="form-label">Confirmação de senha</label>
                                      <input type="password" class="form-control form-control-lg" id="senha2Cliente" name="senha2Cliente" placeholder="Confirme sua senha" required>
                                  </div>
                              </div>
      
                              <div class="mb-4 form-check">
                                  <input type="checkbox" class="form-check-input" id="terms">
                                  <label class="form-check-label" for="terms">Concordo com os termos</label>
                              </div>
      
                              <div class="d-flex justify-content-between">
                                  <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
                                  <!--<button type="submit" class="btn btn-primary" id="enviar" data-bs-toggle="modal" data-bs-target="#modalFeedback">Enviar</button>-->
                                  <!--<a href="#" data-bs-toggle="modal" data-bs-target="#modalFeedback" class="btn" id="enviar">Enviar</a>-->
                                  <a href="../home/home.php" class="btn" id="voltar">Voltar</a>
                              </div>
                          </form>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="direito">
            <img src="arte.png" alt="" class="img-fluid logo">
        </div>

        <?php
            // Verifica se há uma mensagem de erro passada via GET
            $mensagem = '';
            $mensagemErro = '';

            if (isset($_GET["msg"])) {
                $mensagem = $_GET["msg"];

            } else if(isset($_GET["msgErro"])){
                $mensagemErro = $_GET["msgErro"];
            }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #FF6565; font-weight: bold">Feedback do Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if (!empty($mensagemErro)) {  // Verifica se tem mensagem de ERRO
                            echo "<FONT color=#FF6565>$mensagemErro</FONT>";
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="acertoModal" tabindex="-1" aria-labelledby="acertoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: purple; font-weight: bold">Feedback do Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if (!empty($mensagem)) {  // Verifica se tem mensagem de ERRO
                            echo "<FONT color=black>$mensagem</FONT>";
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <a href="../home/home.php" class="btn" style="background-color: rgb(170, 98, 170); color: white;">Continuar</a>
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

            if (!empty($mensagem)) {

                // Exibe o modal se houver uma mensagem de erro
                echo '<script type="text/javascript">
                            window.onload = function() {
                                var acertoModal = new bootstrap.Modal(document.getElementById("acertoModal"));
                                acertoModal.show();
                            }
                        </script>';

                // Redireciona para a mesma página sem o parâmetro `msg` após mostrar o modal
                echo '<script type="text/javascript">
                        window.onload = function() {
                            var acertoModal = new bootstrap.Modal(document.getElementById("acertoModal"));
                            acertoModal.show();
                            history.replaceState(null, "", window.location.href.split("?")[0]);
                        }
                    </script>';
            }

        ?>
        
        <script src="app.js"></script>

    </body>

</html>