<?php

require_once "a.conexaoBD.php";    
static $conexao;

function carregarComboCategoria( $categoria ) {
    $sql = "SELECT * FROM Categoria";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql );

    $options = "";
    while (  $registro = mysqli_fetch_assoc($resultado)  ) {
        // Pegar os campos do REGISTRO
        $idcategoria = $registro["idCategoria"];
        $categoria = $registro["nomeCategoria"];

        if ( $idcategoria == $categoria) {
            $options = $options . "<OPTION SELECTED value='$idcategoria'>$categoria</OPTION>";
        } else {
            $options = $options . "<OPTION value='$idcategoria'>$categoria</OPTION>";
        }
    }

    return $options;

}

function pesquisarPorCategoria() {
    $sql = "SELECT * FROM Categoria";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql );

    return $resultado;

}

function carregarComboSubCategoria($subcategoriaSelecionada, $categoria) {
    $sql = "SELECT * FROM Subcategoria WHERE Categoria_idCategoria = '$categoria'";
    $conexao = conectarBD();    
    $resultado = mysqli_query($conexao, $sql);

    $options = "";
    while ($registro = mysqli_fetch_assoc($resultado)) {
        // Pegar os campos do REGISTRO
        $idsubcategoria = $registro["idSubcategoria"];
        $nomeSubcategoria = $registro["nomeSubcategoria"];

        if ($idsubcategoria == $subcategoriaSelecionada) {
            $options .= "<OPTION SELECTED value='$idsubcategoria'>$nomeSubcategoria</OPTION>";
        } else {
            $options .= "<OPTION value='$idsubcategoria'>$nomeSubcategoria</OPTION>";
        }
    }

    return $options;
}












?>