<?php
require "../../model/categoriaDAO.php";

if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
    // Chame a função para carregar as subcategorias da categoria selecionada
    $options = carregarComboSubCategoria('', $categoria); // O primeiro parâmetro pode ser uma subcategoria selecionada, se houver
    echo $options;
}
?>