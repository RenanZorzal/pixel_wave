window.onload = function(){
    e.preventDefault(e);
    console.log("A página foi carregada!");

    let elemento = document.getElementById('section-resultado');
    let id = elemento.dataset.id;

    console.log(id);
    pesquisarPorId(id);

}

$(document).ready(function () {
    $(".novo-produto").click(function () {
        window.location.href = "produto.php";
    });

    //Quando clicar no botão Pesquisar
    $('#btnPesq').click(function (e) {

        var pesq = $('#campoPesq').val();     // Pegar campo texto da pesquisa

        if (pesq == "") {

            let dados = `
                <div class="erro-pesquisa">
                <img class="img-erro" src="busca-vazia.png" alt="Busca Vazia">
                </div>
            `;
            $('#section-resultado').html(dados).show();
            console.log("Pesquisa Vazia")
            return
        }

        pesquisar(pesq);

    });
});

function pesquisarPorId(id) {
    console.log(id)
    // Chamar o PHP do servidor com AJAX

    $.ajax({
        url: '../../control/produto/pesqProdutoEmp.php',
        type: 'POST',
        data: { id: id },       // Envio do texto de pesquisa
        dataType: 'json',
        success: function (data) {
            console.log("entrou");
            // data == dados de retorno no formato JSON
            // O JSON foi criado com dois campos "erro" e "produtos", onde "produtos" é um array de dados

            // Montar o HTML/DIV com os dados de retorno
            var mostrar = '';

            if (data.erro == "") {
                // Se NÃO tiver erros

                // Percorre todos os produtos do array "produtos", 
                //    onde i é o índice e obj são os dados do produto
                data.produtos.forEach(function (obj, i) {
                    mostrar += "<div class='col-sm-3 col-md-2'>";
                    mostrar += "<div class='card mb-5' style='width: 18rem; height: 30rem;'>";
                    mostrar += "<img src='data:image/jpeg;base64, " + obj.imagem + "' class='card-img-top img-card' alt='Imagem do Produto'>";
                    mostrar += "<div class='card-body'>";
                    mostrar += "<div>";
                    mostrar += "<a href='#' style='text-decoration: none; color: purple; text-align: center;'>";
                    mostrar += "<h3 class='card-title' id='card-body.h3'>" + obj.nomeProduto + "</h3>";
                    mostrar += "</a>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<p><span style='color: purple; font-size: 1.5rem; margin-top: 0;'> R$ " + obj.preco + "</span></p>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<a class='btn btn-dark' href='../carrinho/carrinho.php?addID=" + obj.idProduto + "&nome=" + obj.nomeProduto + "&preco=" + obj.preco + "'>Adicionar ao Carrinho</a>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    //mostrar += "<A href='../controlador/carrinho.php?id=" + obj.idProduto + "'><IMG src='../imagens/add_cart.png' height='30' width='30'></A>";
                });


            } else {

                if (data.erro == 'Produto não encontrado.') {
                    console.log("entrou no erro")
                    mostrar += `
                        <div class="erro-pesquisa">
                        <img class="img-erroEmpresa" src="img/sem-produtos.png" alt="Busca Vazia">
                        </div>
                    `;
                }

                // Sem registros no banco
                //mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
            }

            // Colocar no DIV "resultado" acima
            console.log("Teve resultado")
            $('#resultado-pecas').html(mostrar).show();
        },
        error: function () {
            console.log("error")
            // ERRO ao pesquisar
            var mostrar = "";
            mostrar += "<h4 class='margin'>Erro ao chamar o pesquisar do servidor.</h4>";
            $('#section-resultado').html(mostrar).show();
        }
    });
}

