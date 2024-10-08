<?php

// 1 - Cliente
// 2 - Empresa
// 3 - Vendedor

function validarSessao ($vend, $emp, $cli) {
    if ( isset( $_SESSION["nomeSessao"] ) ) {
        $tipo = $_SESSION["tipoSessao"];
        $nomeSessao = $_SESSION["nomeSessao"];

        switch ( $tipo ) {
            case 1: // Vendedor
                return $vend; 
            case 2: // Empresa
                return $emp;                
            case 3: // Cliente
                return $cli;              
        }                
    } else {
        // Não LOGADO
        return false;
    }

}

?>