<?php

require_once "funcoesuteis.php";

$email = $_POST["inputEmail"];
$senha = $_POST["inputSenha"];
$tipo = $_POST["inlineRadioOptions"];

$msgErro = validarLogin($email, $senha, $tipo);

if ( empty($msgErro) ) {

    if($tipo == 1){

        // Validar no BD
        require_once "../../model/clienteDAO.php";
        
        $registro = verificarLogin($email, $senha);

        if ( $registro != null ) {
            // Logado: inserir na SESSÃO
            session_start();
            $_SESSION["nomeSessao"] = $registro["nomeComprador"];
            $_SESSION["idSessao"] = $registro["idComprador"];
            $_SESSION["tipoSessao"] = $tipo;
            
            header("Location:../../view/home/home.php");

        } else {
            header("Location:../../view/login/login.php?msgErro= Cliente/senha inválidos! Você já possui cadastro?");
        }
    } else{

        // Validar no BD
        require_once "../../model/vendedorDAO.php";
        
        $registro = verificarLogin($email, $senha);

        if ( $registro != null ) {
            // Logado: inserir na SESSÃO
            session_start();
            $_SESSION["nomeSessao"] = $registro["nomeVendedor"];
            $_SESSION["idSessao"] = $registro["idVendedor"];
            $_SESSION["tipoSessao"] = $tipo;
            
            header("Location:../../view/home/home.php");

        } else {
            header("Location:../../view/login/login.php?msgErro= Vendedor/senha inválidos! Você já possui cadastro?");
        }

    }


} else {
    header("Location:../../view/login/login.php?msgErro=$msgErro");
}









?>