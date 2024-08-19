<?php

function validarCampos($nome, $email, $cpf, $datanascimento, $genero, $celular, $senha1, $senha2) {
    $msgErro = "";
    if ( empty($nome) ) {
        $msgErro = $msgErro . "Informe o nome.<br>";        
    }        
    
    if ( empty($ender) ) {
        $msgErro = $msgErro . "Informe o endereço.<br>";
    } 

    if ( validarCPF($cpf) == false) {
        $msgErro = $msgErro . "CPF inválido.<br>";
    }

    if ( validarData($datanascimento) == false) {
        $msgErro = $msgErro . "Data inválida.<br>";
    }

    if ( strlen($senha1) < 6 ) {
        $msgErro = $msgErro . "A senha deve ter mais que 6 caracteres.<br>";
    }
    
    if ( strcmp ($senha1, $senha2) != 0 ) {
        $msgErro = $msgErro . "As senhas não conferem.<br>";
    }


    return $msgErro;

}

function validarCPF($cpf) {
    return true;
}

function validarData($data) {
    $dataSep = explode("/", $data);
    if ( count($dataSep) != 3 ) {
        return false;
    } else {
        $dia = $dataSep[0];
        $mes = $dataSep[1];
        $ano = $dataSep[2];
        return checkdate($mes, $dia, $ano);
    }
}

function converterData ( $data ) { 
    if ( validarData($data) ) {
        $dtsep = explode("/", $data );
        $dia = $dtsep [0];
        $mes = $dtsep[1];
        $ano = $dtsep[2];
        return "$ano-$mes-$dia";
     } else {
          return null;
     }
}




?>