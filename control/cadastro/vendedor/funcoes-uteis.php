<?php

function validarCampos($tipo_vendedor, $nome, $email, $cpf, $data_nasc, $telefonee, $senha, $confimacao_senha) {
    $msgErro = "";

    // Validação if is empty

    if ( empty($nome) ) {
        $msgErro = $msgErro . "Informe o nome.<br>";        
    }        
    
    if ( empty($tipo_vendedor) ) {
        $msgErro = $msgErro . "Informe a o tipo de vendedor.<br>";
    } 

    if ( empty($email) ) {
        $msgErro = $msgErro . "Informe seu e-mail.<br>";
    } 

    if ( empty($data_nasc) ) {
        $msgErro = $msgErro . "Informe sua data de nascimentol.<br>";
    }

    if ( empty($telefone) ) {
        $msgErro = $msgErro . "Informe seu telefone.<br>";
    }

    if ( empty($senha) ) {
        $msgErro = $msgErro . "Informe uma senha.<br>";
    }

    if ( empty($confimacao_senha) ) {
        $msgErro = $msgErro . "Informe suas senhas não correspondem, as escreva novamente.<br>";
    }

    // Validar CPF

    if ( validarCPF($cpf) == false) {
        $msgErro = $msgErro . "CPF inválido.<br>";
    } 

    // Validação de Imagem

    /**if ( $imagem["error"] != 0 ) { // imagem corrompida
        $msgErro = $msgErro . "Imagem corrompida, insira outra imagem.<br>";
    }

    if ( ( $imagem["type"] != "image/jpeg" ) &&
         ( $imagem["type"] != "image/pjpeg" ) &&
         ( $imagem["type"] != "image/png" ) &&
         ( $imagem["type"] != "image/x-png" ) &&
         ( $imagem["type"] != "image/bmp" )) { // tipos de imagem aceitos

        $msgErro = $msgErro . "Tipo de imagem não suportado.<br>";
    }

    if ( $imagem["size"] > 1000000 ) { // tamanho da imagem
        $msgErro = $msgErro . "Imagem muito grande.<br>";
    }**/

    return $msgErro; //retorna todos os erros

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

?>