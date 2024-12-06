<?php
function validarCampos($cep, $logradouro, $numero, $bairro, $cidade, $estado) {
    $msgErro = "";

    // Validação do CEP
    if (strlen($cep) < 8 || !preg_match("/^\d{8}$/", $cep)) {
        $msgErro .= "CEP inválido. ";
    }

    // Verificação se o logradouro está vazio
    if (empty($logradouro)) {
        $msgErro .= "Logradouro é obrigatório. ";
    }

    // Verificação se o número está vazio ou é inválido
    if (empty($numero) || !is_numeric($numero)) {
        $msgErro .= "Número inválido. ";
    }

    // Verificação se o bairro está vazio
    if (empty($bairro)) {
        $msgErro .= "Bairro é obrigatório. ";
    }

    // Verificação se a cidade está vazia
    if (empty($cidade)) {
        $msgErro .= "Cidade é obrigatória. ";
    }

    // Verificação se o estado está vazio
    if (empty($estado)) {
        $msgErro .= "Estado é obrigatório. ";
    }

    // Retorna mensagem de erro, se houver
    return $msgErro;
}
?>