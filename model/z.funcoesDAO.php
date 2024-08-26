<?php

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


function converterDataDoBanco ( $data ) { 
        $dtsep = explode("-", $data );
        $ano = $dtsep [0];
        $mes = $dtsep[1];
        $dia = $dtsep[2];
        return "$dia/$mes/$ano";
}
?>
