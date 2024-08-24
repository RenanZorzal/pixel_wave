<?
function validarCampos($ano, $descricao, $categoria, $preco, $arquivo) {
    $msgErro = "";
    if ( $ano < 1900 && $ano > 2025) {
        $msgErro = $msgErro . "Informe um ano de lançamento válido.<br>";        
    }        



    if (strlen($descricao) > 100) {
        $msgErro = $msgErro . "Descrição muito grande.<br>";
    }
    if (strlen($categoria) > 20) {
        $msgErro = $msgErro . "Categoria muito grande.<br>";
    }
    if ($preco <= 0) {
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
    
    return $msgErro;

}





?>