<?php
function validarCampos($ano, $descricao, $preco, $arquivo, $estoque,$status, $subcategoria, $tipoVendedor, $condicao) {
    $msgErro = "";
    if ( $ano < 1900 || $ano > 2025 || $ano = "") {
        $msgErro = $msgErro . "Informe um ano de lançamento válido.<br>";        
    }        



    if (strlen($descricao) > 1000) {
        $msgErro = $msgErro . "Descrição muito grande.<br>";
    }
  
    if ($preco <= 0 || $preco > 100000) {
        $msgErro = $msgErro . "Preço inválido.<br>";
    }
    if ( $arquivo["error"] != 0 ) {
        $msgErro = $msgErro . "ERRO no upload do arquivo!";
    }
    if ( ( $arquivo["type"] != "image/gif" ) &&
    	( $arquivo["type"] != "image/jpeg" ) &&
        ( $arquivo["type"] != "image/pjpeg" ) &&
        ( $arquivo["type"] != "image/png" ) &&
        ( $arquivo["type"] != "image/x-png" ) &&
        ( $arquivo["type"] != "image/bmp" )  ) {

       $msgErro = $msgErro . "Tipo não permitido!";
    }
    if($status == "Sem estoque" && $estoque != 0){
        $msgErro = $msgErro . "Erro, estoque invalido!";
    }
    if(empty($subcategoria)){
        $msgErro = $msgErro. "Erro, escolha uma subcategoria!";
        
    }
    if($tipoVendedor == 1 && $condicao == "nova"){
        $msgErro = $msgErro . "Apenas empresas podem anunciar produtos novos";
    }
    return $msgErro;

}





?>