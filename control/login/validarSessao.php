<?php

// 1 - Cliente
// 2 - Empresa
// 3 - Vendedor

function validarSessao($vend, $emp, $cli) {
    if (isset($_SESSION["nomeSessao"])) {
        $tipo = $_SESSION["tipoSessao"];

        switch ($tipo) {
            case 1: // Vendedor
                return 'vendedor';
            case 2: // Empresa
                return 'empresa';
            case 3: // Cliente
                return 'cliente';
            default:
                return false; // Caso o tipo seja inválido
        }
    } else {
        // Não LOGADO
        return false;
    }
}
function getId(){
    $id = $_SESSION["idSessao"];
    return $id;
}

?>