<?php

function validarLogin($email, $senha, $tipo) {
    $msgErro = "";

    if (empty($email)) {
        $msgErro = $msgErro . "Email inválido.<br>";
    }

    if (empty($senha)) {
        $msgErro = $msgErro . "Senha inválida.<br>";
    }

    if ( strlen($senha) <= 8 ) {
        $msgErro = $msgErro . "A senha deve ter mais que 8 caracteres.<br>";
    }

    if (empty($tipo)) {
        $msgErro = $msgErro . "Selecione um tipo de login.<br>";
    }
 
    return $msgErro;

}


?>