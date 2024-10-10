<?php

function validarLogin($email, $senha) {
    $msgErro = "";

    if (empty($email) == true) {
        $msgErro = $msgErro . "Email inválido.<br>";
    }

    if ( strlen($senha) <= 8 ) {
        $msgErro = $msgErro . "A senha deve ter mais que 8 caracteres.<br>";
    }
 
    return $msgErro;

}


?>