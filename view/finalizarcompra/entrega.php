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
  <link rel="stylesheet" href="styleProduto.css">
  <link rel="stylesheet" href="../navbar/estilo.css">
  <style>
    .hidden {
      display: none !important; /* Garante que o elemento seja escondido */
    }
  </style>
</head>
<body>

<?php
require_once "../navbar/navbarVendEmp.php";
?>

<!--Página-->
<div class="container mt-5">
  <h1>ENDEREÇO DE ENTREGA</h1>
  <form method="post" action="../../control/endereco/cadEndereco.php" onsubmit="return validarFormulario()">
    <div class="row mb-3">
      <div class="col-md-4">
        <label for="cep" class="form-label"><b>CEP</b></label>
        <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP" required>
      </div>
      <div class="col-md-4 align-self-end">
        <button type="button" class="btn btn-primary w-100" onclick="buscarEndereco()">Buscar Endereço</button>
      </div>
    </div>
    
    <div class="row mb-3">
      <div class="col-md-8">
        <label for="logradouro" class="form-label"><b>Logradouro</b></label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Rua/Avenida">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-4">
        <label for="numero" class="form-label"><b>Número</b></label>
        <input type="text" class="form-control" id="numero" name="numero" placeholder="Número da residência" required>
      </div>
      <div class="col-md-4">
        <label for="complemento" class="form-label"><b>Complemento</b></label>
        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Apartamento, bloco, etc.">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-4">
        <label for="bairro" class="form-label"><b>Bairro</b></label>
        <input type="text" class="form-control" id="bairro" name="bairro">
      </div>
      <div class="col-md-4">
        <label for="cidade" class="form-label"><b>Cidade</b></label>
        <input type="text" class="form-control" id="cidade" name="cidade" readonly>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-4">
        <label for="estado" class="form-label"><b>Estado</b></label>
        <input type="text" class="form-control" id="estado" name="estado" readonly>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-8">
        <button type="submit" class="btn btn-success w-100">Salvar Endereço</button>
      </div>
    </div>
  </form>

  <div id="mensagem-erro" class="alert alert-danger mt-3 hidden">
    Não foi possível buscar o endereço. Verifique o CEP e tente novamente.
  </div>
</div>

<script>
  let cepValido = false; // Variável para rastrear a validação do CEP

  function buscarEndereco() {
    const cep = document.getElementById('cep').value.replace(/\D/g, '');
    if (cep === '') {
      alert('Por favor, insira um CEP válido.');
      return;
    }

    const url = `https://viacep.com.br/ws/${cep}/json/`;

    fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Erro ao buscar o endereço');
        }
        return response.json();
      })
      .then(data => {
        if (data.erro) {
          throw new Error('CEP não encontrado');
        }

        document.getElementById('logradouro').value = data.logradouro;
        document.getElementById('bairro').value = data.bairro;
        document.getElementById('cidade').value = data.localidade;
        document.getElementById('estado').value = data.uf;
        document.getElementById('mensagem-erro').classList.add('hidden');
        cepValido = true; // CEP foi validado com sucesso
      })
      .catch(error => {
        console.error(error);
        document.getElementById('mensagem-erro').classList.remove('hidden');
        cepValido = false; // CEP inválido
      });
  }

  function validarFormulario() {
    if (!cepValido) {
      alert('Por favor, verifique o CEP antes de salvar.');
      return false; // Bloqueia o envio do formulário
    }
    return true; // Permite o envio do formulário
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
