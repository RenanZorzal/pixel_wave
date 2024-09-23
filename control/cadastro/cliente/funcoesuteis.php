<?php

function validarCampos($nome, $cpf, $email, $telefone, $senha1, $senha2) {
    $msgErro = "";
    if ( empty($nome) ) {
        $msgErro = $msgErro . "Informe o nome.<br>";        
    }        



    if (verificarCPF($cpf) == false) {
        $msgErro = $msgErro . "CPF inválida.<br>";
    }
    if (validarEmail($email) == false) {
        $msgErro = $msgErro . "Email inválido.<br>";
    }
    /*
    if (validarNumero($telefone) == false) {
        $msgErro = $msgErro . "Celular inválido.<br>";
    }
    */

    if ( strlen($senha1) <= 8 ) {
        $msgErro = $msgErro . "A senha deve ter mais que 8 caracteres.<br>";
    }
    
    if ( strcmp ($senha1, $senha2) != 0 ) {
        $msgErro = $msgErro . "As senhas não conferem.<br>";
    }

    
    return $msgErro;

}
function validarCampos2($nome, $email, $telefone, $arquivo = null) {
    $msgErro = "";
    
    // Valida o nome
    if (empty($nome)) {
        $msgErro .= "Informe o nome.<br>";
    }        

    // Valida o email
    if (validarEmail($email) == false) {
        $msgErro .= "Email inválido.<br>";
    }

    // Verifica se um arquivo foi enviado para validar a imagem
    if ($arquivo && $arquivo["error"] != 0) {
        $msgErro .= "ERRO no upload do arquivo!<br>";
    }

    // Validação do telefone (se aplicável)
    /*
    if (validarNumero($telefone) == false) {
        $msgErro .= "Telefone inválido.<br>";
    }
    */
    if ( $arquivo["size"] > 500000   ) {
        $msgErro = $msgErro . "Arquivo muito grande!";
} 
    if ( $arquivo["error"] != 0 ) {
        $msgErro = $msgErro . "ERRO no upload do arquivo!";
    }
 


    return $msgErro;
}
function verificarMaioridade($dataNascimento) {
    // Converte a data de nascimento para o formato DateTime
    $dataNascimento = new DateTime($dataNascimento);
    
    // Obtém a data atual
    $dataAtual = new DateTime();
    
    // Calcula a diferença entre a data atual e a data de nascimento
    $idade = $dataAtual->diff($dataNascimento);
    
    // Verifica se a pessoa tem 18 anos ou mais
    if ($idade->y >= 18) {
        return true; // A pessoa é maior de idade
    } else {
        return false; // A pessoa é menor de idade
    }
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
/*
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
*/
function verificarSenha($senha1,$senha2){
    $msgErro = "";
    if ( strlen($senha1) <= 8 ) {
        $msgErro = $msgErro . "A senha deve ter mais que 8 caracteres.<br>";
    }
    
    if ( strcmp ($senha1, $senha2) != 0 ) {
        $msgErro = $msgErro . "As senhas não conferem.<br>";
    }
    return $msgErro;
}




?>