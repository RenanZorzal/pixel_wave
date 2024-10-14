<?php

// 1 - Cliente
// 2 - Empresa
// 3 - Vendedor

/*function validarSessao ($vend, $emp, $cli) {
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

}*/

// Definir as constantes para os tipos de usuários
define('TIPO_CLIENTE', 1);
define('TIPO_EMPRESA', 2);
define('TIPO_VENDEDOR', 3);

// Mapear os tipos de usuários com as respectivas navbar
$navbarMap = [
    TIPO_CLIENTE => '../navbar/navbarCliente.php',
    TIPO_VENDEDOR => '../navbar/navbarVendEmp.php',
    TIPO_EMPRESA => '../navbar/navbarVendEmp.php',
];

function validarSessao(){

    // Verificar se a sessão está ativa e obter o tipo de usuário
    if (isset($_SESSION['nomeSessao']) && isset($_SESSION['tipoSessao'])) {
        $tipoUsuario = $_SESSION['tipoSessao'];
        
        if (isset($navbarMap[$tipoUsuario])) {
            return $navbarMap[$tipoUsuario];
        } else {
            return null;
        }

    } else {
        // Usuário não logado
        require_once "../navbar/navbarDeslogado.php";
    }
}

?>