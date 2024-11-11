// Adicionando um evento de clique ao botão
const botaoRegistrar = document.querySelector('.div-registre');

botaoRegistrar.addEventListener('click', function () {

    // Aqui você define a ação que será executada ao clicar no botão
    console.log('Botão clicado!');

    // Exemplo de redirecionamento:
    window.location.href = '../home/home.php';
});

const botaoVoltar = document.querySelector('.div-botao');

botaoVoltar.addEventListener('click', function () {

    // Aqui você define a ação que será executada ao clicar no botão
    console.log('Botão clicado!');

    // Exemplo de redirecionamento:
    window.location.href = '../home/home.php';
});