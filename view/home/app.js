
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

function renderCard(){
    return `
            <div class="col-sm-3 col-md-2">
                <div class="card mb-5" style="width: 18rem; height: 28rem; ">
                  <img src="https://zh.rbsdirect.com.br/imagesrc/21718277.jpg?w=700" class="card-img-top" alt="...">
                  <div class="card-body">
                    <div>
                      <a href="#" style="text-decoration: none; color: purple;">
                        <h3 class="card-title" id="card-body.h3">Google Pixel</h3>
                      </a>
                    </div>

                    <div>
                      <strike style="color: gray; font-size: 1.2rem; margin-bottom: 0;">R$350.00</strike>
                      <p><span style="color: purple; font-size: 1.5rem; margin-top: 0;">R$330.00</span></p>
                    </div>

                    <div>
                      <a href="#" class="btn btn-dark">Adicionar ao Carrinho</a>
                    </div>
                    </div>
                </div>
              </div>
        `;
}

let mainSection = document.getElementById("resultado-pecas");
let mainCards = renderCard();
mainSection.innerHTML = mainCards;

console.log("Teste 1")