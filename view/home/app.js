
function pesquisar(){
    let section = document.getElementById("resultado-pecas");
    let pesquisa = document.getElementById("campo-pesquisa");

    //conectar com o php e buscar o resultado da pesquisa no banco, e por fim, através de um innerHTML colocaremos na página os resultados

    if(!pesquisa){
        // Pesquisa Vazia
    } 

    $.ajax({
        url: '../../control/pesquisar.php',
        type: 'POST',
        data: JSON.stringify(pesquisa),
        contentType: 'application/json',
        success: function (response) {
            // Processar a resposta do PHP
            // Pegar a resposta do PHP e inserir na página html pelo innerHTML
            console.log(response);
        },
        error: function (error) {
            console.error('Erro:', error);
        }
    });
} 