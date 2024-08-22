<?php

function validarCampos($nome, $email, $cpf, $datanascimento, $celular, $senha1, $senha2) {
    $msgErro = "";
    if ( empty($nome) ) {
        $msgErro = $msgErro . "Informe o nome.<br>";        
    }        

    if (maiorIdade($datanascimento) == false) {
        $msgErro = $msgErro . "Data de nascimento inválida!.<br>";
    }

    if (verificarCPF($cpf) == false) {
        $msgErro = $msgErro . "CPF inválida.<br>";
    }
    if (validarEmail($email) == false) {
        $msgErro = $msgErro . "Email inválido.<br>";
    }
    if (validarNumero($celular) == false) {
        $msgErro = $msgErro . "Celular inválido.<br>";
    }

    if ( strlen($senha1) < 6 ) {
        $msgErro = $msgErro . "A senha deve ter mais que 6 caracteres.<br>";
    }
    
    if ( strcmp ($senha1, $senha2) != 0 ) {
        $msgErro = $msgErro . "As senhas não conferem.<br>";
    }

    
    return $msgErro;

}

function maiorIdade($data) {
    // Converte a data de nascimento para o formato de DateTime
    $data = new DateTime($data);
    
    // Obtém a data atual
    $hoje = new DateTime();

    // Calcula a diferença de idade
    $idade = $hoje->diff($data)->y;

    // Verifica se a idade é maior ou igual a 18
    return $data >= 18;
}

function verificarCPF($cpf) {
    // Remove caracteres não numéricos (pontos e traços)
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais (caso de CPF inválido)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}
function validarEmail($email) {
    // Valida o formato do email
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarNumero($numero) {
    // Converte o número para string para facilitar a verificação de comprimento
    $numeroStr = (string) $numero;

    // Verifica se o número tem 10 ou 11 dígitos
    if (strlen($numeroStr) === 10 || strlen($numeroStr) === 11) {
        return true;
    } else {
        return false;
    }
}




?>