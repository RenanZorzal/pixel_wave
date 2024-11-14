<?php
    require_once "../../../model/empresaDAO.php";
function validarCampos($tipo, $nome, $email, $cnpj, $data_abertura, $telefone, $celular, $razaoSocial, $inscricaoEstadual, $senha, $confirmacao_senha) {
    $msgErro = "";

    // Validação if is empty

    if ( empty($nome) || validarNome($nome) == false) {
        $msgErro = $msgErro . "Informe o seu nome corretamente.<br>";        
    }        
    
    if ( empty($tipo) ) {
        $msgErro = $msgErro . "Informe a o tipo de cadastro.<br>";
    } 



    if(verificarEmail($email) == 1){
        $msgErro = $msgErro. "Email já existe!<br>";
    }
    if ( verificarCNPJ($cnpj) == 1) {
        $msgErro = $msgErro . "CNPJ Já Existe!.<br>";
    } 
    if ( empty($email) || validarEmail($email) == false) {
        $msgErro = $msgErro . "Informe seu e-mail no formato correto.<br>";
    } 
 
    if ( validarCNPJ($cnpj) == false) {
        $msgErro = $msgErro . "CNPJ inválido.<br>";
    } 

    if ( empty($data_abertura)) {
        $msgErro = $msgErro . "Informe sua data de abertura.<br>";
    }

    if ( empty($telefone) || validarNumero($telefone) == false) {
        $msgErro = $msgErro . "Informe seu telefone corretamente.<br>";
    }

    if ( empty($celular) || validarNumero($celular) == false) {
        $msgErro = $msgErro . "Informe seu celular corretamente.<br>";
    }

    if ( empty($razaoSocial) ) {
        $msgErro = $msgErro . "Informe sua Razão Social. <br>";
    }

    if ( empty($inscricaoEstadual) ) {
        $msgErro = $msgErro . "Informe sua Inscrição Estadual. <br>";
    }

    if ( empty($senha) || validarSenha($senha) == false) {
        $msgErro = $msgErro . "Informe uma senha com no mínimo 8 dígitos.<br>";
    }

    if ( empty($confirmacao_senha) ) {
        $msgErro = $msgErro . "Informe sua senha novamente. <br>";
    }

    if ( confirmarSenha($senha, $confirmacao_senha) == false ) {
        $msgErro = $msgErro . "Suas senhas não correspondem. <br>";
    }


    return $msgErro; //retorna todos os erros

}
function validarCampos2($nome, $email, $data_abertura, $telefone, $celular, $razaoSocial, $inscricaoEstadual, $arquivo) {
    $msgErro = "";
    if(verificarEmail($email) == 1){
        $msgErro = $msgErro. "Email já existe!<br>";
    }
    if ( verificarCNPJ($cnpj) == 1) {
        $msgErro = $msgErro . "CNPJ Já Existe!.<br>";
    } 
    // Validação de campos vazios e formatos
    if (empty($nome) || !validarNome($nome)) {
        $msgErro .= "Informe o seu nome corretamente.<br>";
    }

    if (empty($email) || !validarEmail($email)) {
        $msgErro .= "Informe seu e-mail no formato correto.<br>";
    }

    if (empty($data_abertura)) {
        $msgErro .= "Informe sua data de abertura.<br>";
    }

    if (empty($telefone) || !validarNumero($telefone)) {
        $msgErro .= "Informe seu telefone corretamente.<br>";
    }

    if (empty($celular) || !validarNumero($celular)) {
        $msgErro .= "Informe seu celular corretamente.<br>";
    }

    if (empty($razaoSocial)) {
        $msgErro .= "Informe sua Razão Social.<br>";
    }

    if (empty($inscricaoEstadual)) {
        $msgErro .= "Informe sua Inscrição Estadual.<br>";
    }

    // Validação de arquivo (se foi enviado)
    if (!empty($arquivo) && $arquivo["error"] == 0) {
        if ($arquivo["size"] > 500000) {
            $msgErro .= "Arquivo muito grande! O tamanho máximo permitido é 500KB.<br>";
        }
    } else if ($arquivo["error"] != 0) {
        $msgErro .= "Erro no upload do arquivo!<br>";
    }

    return $msgErro; // Retorna todas as mensagens de erro
}


function validarNome($nome){
    if(strlen($nome) < 2){
        return false;
        
    } else {
        return true;
    }
}

function validarEmail($email) {
    // Valida o formato do email
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarCNPJ($cnpj) {
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;

	// Verifica se todos os digitos são iguais
	if (preg_match('/(\d)\1{13}/', $cnpj))
		return false;	

	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
		return false;

	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

function removerMascaraTelefone($telefone) {
    return preg_replace('/\D/', '', $telefone);
}

function validarNumero($numero) {
    // Converte o número para string para facilitar a verificação de comprimento
    $numeroStr = (string) $numero;

    // Verifica se o número tem 10 ou 11 dígitos
    if (strlen($numeroStr) == 10 || strlen($numeroStr) == 11) {
        return true;
    } else {
        return false;
    }
}

function validarSenha($senha){
    if(strlen($senha) < 8){
        return false;
    } else {
        return true;
    }
}

function confirmarSenha($senha, $confirmacao_senha){
    if ($confirmacao_senha != $senha){
        return false;
    } else{
        return true;
    }
}

?>