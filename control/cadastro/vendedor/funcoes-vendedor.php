<?php

function validarCampos($tipo, $nome, $email, $cpf, $data_nasc, $telefone, $senha, $confirmacao_senha) {
    $msgErro = "";

    // Validação if is empty

    if ( empty($nome) || validarNome($nome) == false) {
        $msgErro = $msgErro . "Informe o seu nome corretamente.<br>";        
    }        
    
    if ( empty($tipo) ) {
        $msgErro = $msgErro . "Informe a o tipo de cadastro.<br>";
    } 

    if ( empty($email) || validarEmail($email) == false) {
        $msgErro = $msgErro . "Informe seu e-mail no formato correto.<br>";
    } 

    if ( validarCPF($cpf) == false) {
        $msgErro = $msgErro . "CPF inválido.<br>";
    } 

    if ( empty($data_nasc)) {
        $msgErro = $msgErro . "Informe sua data de nascimento.<br>";
    }

    if ( maiorIdade($data_nasc == false)) {
        $msgErro = $msgErro . "Desculpe, é preciso ser maior de idade para fazer seu cadastro como Vendedor Autônomo.<br>";
    }

    if ( empty($telefone) || validarNumero($telefone) == false) {
        $msgErro = $msgErro . "Informe seu telefone corretamente.<br>";
    }

    if ( empty($senha) || validarSenha($senha) == false) {
        $msgErro = $msgErro . "Informe uma senha com no mínimo 8 dígitos.<br>";
    }

    if ( empty($confirmacao_senha) ) {
        $msgErro = $msgErro . "Informe sua senha novamente. <br>";
    }

    if ( confirmarSenha($confirmacao_senha) == false ) {
        $msgErro = $msgErro . "Suas senhas não correspondem. <br>";
    }


    return $msgErro; //retorna todos os erros

}

function validarNome($nome){
    if(strlen($nome) < 8){
        return false;
        
    } else {
        return true;
    }
}

function validarEmail($email) {
    // Valida o formato do email
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
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

function validarSenha($senha){
    if(strlen($senha) <= 8){
        return false;
    } else {
        return true;
    }
}

function confirmarSenha($senha, $confirmacao_senha){
    if ($confirmacao_senha != $senha){
        return false;
    } else{
        return true;
    }
}

?>