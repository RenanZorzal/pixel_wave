window.onload = function () {

    document.getElementById("navbar").style.display = "none";
}

// Adicionando um evento de clique ao botão
const botaoRegistrar = document.querySelector('.div-registre');

botaoRegistrar.addEventListener('click', function () {

    // Aqui você define a ação que será executada ao clicar no botão
    console.log('Botão clicado!');

    // Exemplo de redirecionamento:
    window.location.href = 'http://localhost/pixel_wave/view/cadastro/cadastro.php';
});

$(document).ready(function () {


    $('.navbar-invisivel').on({
        mouseover: () => {
            $('#navbar').stop().slideDown(200);
        },
        mouseout: () => {
            // Adiciona um timeout para ocultar a navbar após 500ms (ajuste o tempo conforme necessário)
            setTimeout(() => {
                $('#navbar').slideUp(200);
            }, 5000);
        }
    });

});