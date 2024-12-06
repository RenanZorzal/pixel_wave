// Adicionando um evento de clique ao botão
const botaoVoltar = document.querySelector('.div-botao');

botaoVoltar.addEventListener('click', function () {

    // Aqui você define a ação que será executada ao clicar no botão
    console.log('Botão clicado!');

    // Exemplo de redirecionamento:
    window.location.href = '../home/home.php';
});

function mostrarForm() {
    // Esconder todos os formulários
    document.getElementById("formDiv1").style.display = "none";
    document.getElementById("formDiv2").style.display = "none";
    document.getElementById("formDiv3").style.display = "none";

    // Obter o valor do radio button selecionado
    var radios = document.getElementsByName("inlineRadioOptions");

    if (radios[0].checked) {
        //o value deve ser o mesmo id da div a que corresponde
        document.getElementById(radios[0].value).style.display = "block";

    } else if (radios[1].checked) {
        document.getElementById(radios[1].value).style.display = "block";

    } else {
        document.getElementById(radios[2].value).style.display = "block";
    }
}

//função que mascara o numero de telefone 
const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
}

// Função para contar a quantidade de caracteres
function contarCaracteres() {

    // Limite de caracteres permitido no campo
    const limiteCaracteres = 11;

    // Recuperar o seletor com id "mensagem"
    var mensagem = document.getElementById("mensagem");

    // Recuperar o conteúdo do campo "mensagem"
    // value - valor que o campo possui
    var mensagemConteudo = mensagem.value;

    // Verificar se o conteúdo digitado pelo usuário é maior que o limite de caracteres permitido no campo
    // length - quantidade de caracteres
    if (mensagemConteudo.length > limiteCaracteres) {

        // Enviar para o campo mensagem somente os primeiros 120 caracteres
        // mensagemConteudo - POssui o valor atual do campo de texto
        // A função slice() permite extrair uma parte da string com base nos índices especificados. No exemplo, é utilizado o intervalo de 0 a 120. 
        mensagem.value = mensagemConteudo.slice(0, limiteCaracteres);
    }

    // Contar a quantidade de caracteres e enviar para o SELETOR "contador" no HTML
    // mensagem.value.length - Contar a quantidade de caracteres
    document.getElementById("contador").textContent = mensagem.value.length;
} 

function formatarCPF(cpf) {
    // Remove todos os caracteres não numéricos
    cpf = cpf.replace(/\D/g, "");

    // Checa se o CPF contém 11 dígitos
    if (cpf.length <= 11) {
        // Insere os pontos e o hífen
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
    }

    return cpf;
}

// Obtém o elemento do input
var inputCPFvend = document.getElementById('cpfVendedor');
var inputCPFcli = document.getElementById('cpfCliente');

// Adiciona um listener de evento para o evento 'input'
inputCPFvend.addEventListener('input', function () {
    this.value = formatarCPF(this.value);
});

// Adiciona um listener de evento para o evento 'input'
inputCPFcli.addEventListener('input', function () {
    this.value = formatarCPF(this.value);
});

function formatarCNPJ(cnpj) {
    // Remove todos os caracteres não numéricos
    cnpj = cnpj.replace(/\D/g, "");

    // Checa se o CNPJ contém 14 dígitos
    if (cnpj.length <= 14) {
        // Insere os pontos, barra e hífen
        cnpj = cnpj.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5");
    }

    return cnpj;
}

// Obtém o elemento do input
var inputCNPJ = document.getElementById('cnpj');

// Adiciona um listener de evento para o evento 'input'
inputCNPJ.addEventListener('input', function () {
    this.value = formatarCNPJ(this.value);
});


$(document).ready(function () {
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
});


