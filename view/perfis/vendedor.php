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
    <link rel="stylesheet" href="cliente.css">
    <link rel="stylesheet" href="../navbar/estilo.css">

</head>

<body>


    <?php
    require_once "../navbar/navbarVendEmp.php";
    require_once '../../model/vendedorDAO.php';
    $resultado = pesquisarVendedorPorID(1);
    $registro = mysqli_fetch_assoc($resultado);
    $nome = $registro["nomeVendedor"];
    $desc = $registro["descricaoVendedor"];
    $email = $registro["emailVendedor"];
    $telefone = $registro["telefoneVendedor"];
    $celular = $registro["celularVendedor"];
    $cnpj = $registro["CNPJ_CPF"];
    $razaoSocial = $registro["razaoSocial"];
    $dtNasc = $registro["data_nascimentoVendedor"];
    $inscricaoEstadual = $registro["inscricaoEstadual"];
    $descricao = $registro["descricaoVendedor"];
    $arquivo = $registro["imgVendedor"];
    $fotoImg = base64_encode($arquivo);

    ?>


    <!--Página-->
    <div class="d-flex justify-content-center align-items-center">
        <div class="mt-5 shadow-box2" style="background-color: white">
            <div class="d-flex justify-contentet-center align-items-center">
                <?php
                echo '<img id="image-profile" class="image-profile mt-2 shadow-box" src="data:image/jpeg;base64,' . $fotoImg . '">';
                ?>
                <h1 style="text-align: center; color: #502779" class="ms-5"><b>MEU PERFIL</b></h1>
            </div>
            <div class="container form-container">

                <form action="../../control/cadastro/vendedor/alterVendedor.php" method="POST"
                    enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nomeVendedor" class="form-label">Nome</label>
                            <input type="text" class="form-control shadow-box" id="nomeVendedor" name="nomeVendedor"
                                value="<?php echo $nome; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control shadow-box" id="email" name="emailVendedor"
                                value="<?php echo $email; ?>">

                        </div>
                        <div class="col-md-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control shadow-box" id="cpf" value="<?php echo $cnpj; ?>"
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control shadow-box" id="telefone" name="telefoneVendedor"
                                value="<?php echo $telefone; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="datanascimento" class="form-label">Data de nascimento</label>
                            <input type="date" class="form-control shadow-box" id="datanascimento" name="dtNascVendedor"
                                value="<?php echo $dtNasc; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="descricaoVendA" class="form-label">Descrição</label>
                            <input type="text" class="form-control shadow-box" id="descricaoVendA" name="descricaoVendA"
                                value="<?php echo $descricao; ?>">
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="col-md-6">
                                <label for="imagem" class="form-label">Imagem <i class="bi bi-upload"></i></label>
                                <input type="file" class="form-control shadow-box" id="imagem" name="arquivoVend"
                                    accept="image/*" onchange="previewImage(event)">
                                <!-- A imagem padrão exibida inicialmente -->

                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn justify-content-center fs-5"
                            style="background-color:#502779; color:white">Salvar alterações</button>

                    </div>
                    <div class="d-flex flex-column justify-content-center mt-4">
                        <a href="senhavendedor.php" class="text-decoration-none text-center fs-5"
                            style="color: #502779"><u>Alterar senha</u></a>
                        <a href="#" class="text-decoration-none text-center fs-5" style="color: #502779"><u>Meus
                                anúncios</u></a>
                    </div>
                </form>
            </div>
        </div>
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
                    <h5 class="modal-title" style="color: #FF6565; font-weight: bold">Feedback de Alteração</h5>
                </div>
                <div class="modal-body">
                    <?php if (!empty($mensagemErro)) {  // Verifica se tem mensagem de ERRO
                        echo "<FONT color=#FF6565>$mensagemErro</FONT>";
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="acertoModal" tabindex="-1" aria-labelledby="acertoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: purple; font-weight: bold">Feedback de Alteração</h5>
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

    <script>
        function previewImage(event) {
            const preview = document.getElementById('image-profile');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
</body>

</html>
<!-- Bootstrap JavaScript (opcional, necessário para funcionalidades como o dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>