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

            <div class="d-flex justify-content-center">
            <div class="container-fluid">
                <div class="d-flex mt-5 justify-content-center">
                    <div>
                    <h1 class="h1">Erro dados incorretos!</h1>
                    
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <a href="cadastro.php">
                    <button type="button" class="btn btn-primary m-5" style="background-color: #4ABFB2; border-color: #3BA99C">Voltar</button>
                    </a>
                    </div>
                </div>
            </div>
 

            </div>
          
     

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