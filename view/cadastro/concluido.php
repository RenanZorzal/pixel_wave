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

            <div class="baixo d-flex justify-content-center">
            <div class="container-fluid">
                <div class="d-flex mt-5 justify-content-center">
                    <div>
                    <h1 class="h1">Cadastro concluido com sucesso!</h1>
                    
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <a href="../home/home.php">
                    <button type="button" class="btn btn-primary m-5" style="background-color: #4ABFB2; border-color: #3BA99C">Continuar</button>
                    </a>
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

        <?php
            // Exibir a mensagem de ERRO caso OCORRA
            if (isset($_GET["msg"])) {  // Verifica se tem mensagem de ERRO
                $mensagem = $_GET["msg"];
                echo "<FONT color=red>$mensagem</FONT>";
            }
        ?>



    </body>

</html>