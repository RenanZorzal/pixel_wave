<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Wave</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CSS (opcional, para ícones) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="styleLogin.css">
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

    <header>
        <div class="div-botao">
            <img src="img/button-voltar.png" alt="Botão de Voltar" class="botaoVoltar">
        </div>
    </header>

    <main>
        <div class="logo-space">
            <img src="img/logo-login.png" alt="Homem surfando na Pixel Wave" class="logo-login">
        </div>
        <div class="nomenclaturas">
            <img src="img/logo-site.png" alt="Logo Pixel Wave" class="logo-site">

            <div class="formulario-box">

                <form method="post" name="formLogin" class="itens-formulario" action="../../control/login/logar.php" enctype="multipart/form-data">

                    <img src="img/login.png" alt="Login" class="login">

                    <div style="margin-top: 2%; height: 8%" class="radios">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Vendedor Autonômo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Empresa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                            <label class="form-check-label" for="inlineRadio3">Cliente</label>
                        </div>

                    </div>

                    <div class="input-group flex-nowrap input-login">
                        <span class="input-group-text" id="addon-wrapping">@</span>
                        <input type="text" class="form-control" name="inputEmail" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>

                    <div class="input-senha">
                        <div class="input-group flex-nowrap input-login">
                            <span class="input-group-text" id="addon-wrapping"> • </span>
                            <input type="password" id="inputPassword5" class="form-control" name="inputSenha" placeholder="Senha" aria-describedby="passwordHelpBlock">
                        </div>
                        
                        <div id="passwordHelpBlock" class="form-text">
                        Sua senha deve ter no mínimo 9 caracteres.
                        </div>
                    </div>

                    <div class="input-login">
                        <button type="submit" class="botao">Continuar</button>
                    </div>
                
                </form>
                
            </div>

            <div class="div-registre">
                <img src="img/registre-se.png" alt="Registre-se" class="registre">
            </div>
        </div>

    </main>
    
    <?php
        // Verifica se há uma mensagem de erro passada via GET
        $mensagemErro = '';

        if(isset($_GET["msgErro"])){
            $mensagemErro = $_GET["msgErro"];
            //echo "<FONT color=red>$mensagemErro</FONT>";
        }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #FF6565; font-weight: bold">Feedback de Login</h5>
                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                <?php if (!empty($mensagemErro)) {  // Verifica se tem mensagem de ERRO
                        echo "<FONT color=#FF6565>$mensagemErro</FONT>";
                } ?>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>--->
            </div>
            </div>
        </div>
    </div>

    <?php 

       if (!empty($mensagemErro)) {

            // Exibe o modal se houver uma mensagem de erro
            echo '<script type="text/javascript">
                        window.onload = function() {
                            console.log("modal");
                            var errorModal = new bootstrap.Modal(document.getElementById("errorModal"));
                            errorModal.show();
                        }
                    </script>';

            // Redireciona para a mesma página sem o parâmetro `msg` após mostrar o modal
            echo "<script type='text/javascript'>
                    $('#modalDeslog').on('hidden.bs.modal', function (e) {
                    window.location.href = window.location.origin + window.location.pathname;
                    });
                </script>";
        }

    ?>

    <script src="app.js"></script>

</body>
</html>