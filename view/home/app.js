window.onload = function () {

    console.log("A página foi carregada!");

    let pesq = "";
    
    $.ajax({
        url: '../../control/produto/pesqProduto.php',
        type: 'POST',
        data: { pesq: pesq },       // Envio do texto de pesquisa
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
                    mostrar += "<div class='card mb-5' style='width: 18rem; height: 30rem'>";
                    mostrar += "<img src='data:image/jpeg;base64, " + obj.imagem + "' class='card-img-top img-card' alt='Imagem do Produto'>";
                    mostrar += "<div class='card-body'>";
                    mostrar += "<div>";
                    mostrar += "<a style='color: purple; text-align: center;' href='../compra/compra.php?id=" + obj.idProduto + "'>";
                    mostrar += "<h3 class='card-title' id='card-body.h3'>" + obj.nomeProduto + "</h3>";
                    mostrar += "</a>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<strike style='color: gray; font-size: 1.2rem; margin-bottom: 0;'> R$ " + obj.precoSemDesconto + "</strike>";
                    mostrar += "<p><span style='color: purple; font-size: 1.5rem; margin-top: 0;'> R$ " + obj.preco + "</span></p>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<a href='#' class='btn btn-dark'>Adicionar ao Carrinho</a>";
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
                        <img class="img-erroProduto" src="produto-nao-encontrado.png" alt="Busca Vazia">
                        </div>
                    `;
                }

                // Sem registros no banco
                //mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
            }

            // Colocar no DIV "resultado" acima
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
    

};


//  FUNÇÕES DE PESQUISA

$(document).ready(function () {

    //Quando clicar no botão Pesquisar

    $('#btnPesquisa').click(function (e) {

        var pesq = $('#campoPesquisa').val();     // Pegar campo texto da pesquisa
        
        if(pesq == ""){
            
            let dados = `
                <div class="erro-pesquisa">
                <img class="img-erro" src="busca-vazia.png" alt="Busca Vazia">
                </div>
            `;
            $('#resultado-pecas').html(dados).show();
            console.log("Pesquisa Vazia")
            document.getElementById("highlightCarousel").style.display = "block";
            document.getElementById("dark-nav").style.display = "block";

            return
        }

        pesquisar(pesq);

    });


    //Quando uma categoria for escolhida 

    $('.categ').on({

        click: function (event) {
            event.preventDefault();
            var href = $(this).attr('href');
            console.log("O id da categoria é:", href);
        },
        mouseover: function () {
            $(this).next('.dropdown-subcategoria').addClass('show');
        },
        mouseout: function () {
            $(this).next('.dropdown-subcategoria').removeClass('show');
        }
    });

    $('.subcateg').on({

        click: function (event) {
            event.preventDefault();
            console.log("subcateg");

            var href = $(this).attr('href');
            console.log("O id da categoria é:", href);

            const textLink = $(this).text();

            pesquisarPorSubcategoria(href, textLink);
        }
    });

});

function pesquisar(pesq){
    console.log(pesq)
    // Chamar o PHP do servidor com AJAX

    $.ajax({
        url: '../../control/produto/pesqProduto.php',
        type: 'POST',
        data: { pesq: pesq },       // Envio do texto de pesquisa
        dataType: 'json',
        success: function (data) {
            console.log("entrou");
            // data == dados de retorno no formato JSON
            // O JSON foi criado com dois campos "erro" e "produtos", onde "produtos" é um array de dados

            // Montar o HTML/DIV com os dados de retorno
            var mostrar = '';

            if (data.erro == "") {
                // Se NÃO tiver erros

                if (data.produtos.length == 1) {
                    mostrar += "<div class='produtosEncontrados'> <h4>Foi encontrado 1 produto.</h4> </div>";
                } else {
                    mostrar += "<div class='produtosEncontrados'> <h4>Foram encontrados " + data.produtos.length + " produtos.</h4> </div>";
                }

                // Percorre todos os produtos do array "produtos", 
                //    onde i é o índice e obj são os dados do produto
                data.produtos.forEach(function (obj, i) {
                    mostrar += "<div class='col-sm-3 col-md-2'>";
                    mostrar += "<div class='card mb-5' style='width: 18rem; height: 30rem'>";
                    mostrar += "<img src='data:image/jpeg;base64, " + obj.imagem +"' class='card-img-top img-card' alt='Imagem do Produto'>";
                    mostrar += "<div class='card-body'>";
                    mostrar += "<div>";
                    mostrar += "<a href='#' style='text-decoration: none; color: purple; text-align: center'>";
                    mostrar += "<h3 class='card-title' id='card-body.h3'>"+ obj.nomeProduto +"</h3>";
                    mostrar += "</a>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<strike style='color: gray; font-size: 1.2rem; margin-bottom: 0;'> R$ "+ obj.precoSemDesconto +"</strike>";
                    mostrar += "<p><span style='color: purple; font-size: 1.5rem; margin-top: 0;'> R$ "+ obj.preco +"</span></p>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<a href='#' class='btn btn-dark'>Adicionar ao Carrinho</a>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    //mostrar += "<A href='../controlador/carrinho.php?id=" + obj.idProduto + "'><IMG src='../imagens/add_cart.png' height='30' width='30'></A>";
                });


            } else {
                if(data.erro == 'Produto não encontrado.'){
                    console.log("entrou no erro")
                    mostrar += `
                        <div class="erro-pesquisa">
                        <img class="img-erroProduto" src="produto-nao-encontrado.png" alt="Busca Vazia">
                        </div>
                    `;
                }

                // Sem registros no banco
                //mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
            }

            document.getElementById("highlightCarousel").style.display = "none";
            document.getElementById("dark-nav").style.display = "none";

            // Colocar no DIV "resultado" acima
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

function pesquisarPorSubcategoria(cat, textLink) {
    console.log(cat)
    // Chamar o PHP do servidor com AJAX

    $.ajax({
        url: '../../control/produto/subcategorias.php',
        type: 'POST',
        data: { cat: cat },       // Envio do texto de pesquisa
        dataType: 'json',
        success: function (data) {
            console.log("entrou");
            // data == dados de retorno no formato JSON
            // O JSON foi criado com dois campos "erro" e "produtos", onde "produtos" é um array de dados

            // Montar o HTML/DIV com os dados de retorno
            var mostrar = '';

            if (data.erro == "") {
                // Se NÃO tiver erros

                if (data.produtos.length > 0) {
                    mostrar += "<div class='produtosEncontrados'> <h3>" + textLink +"</h3> </div>";
                } 

                // Percorre todos os produtos do array "produtos", 
                //    onde i é o índice e obj são os dados do produto
                data.produtos.forEach(function (obj, i) {
                    mostrar += "<div class='col-sm-3 col-md-2'>";
                    mostrar += "<div class='card mb-5' style='width: 18rem; height: 30rem'>";
                    mostrar += "<img src='data:image/jpeg;base64, " + obj.imagem + "' class='card-img-top img-card' alt='Imagem do Produto'>";
                    mostrar += "<div class='card-body'>";
                    mostrar += "<div>";
                    mostrar += "<a href='#' style='text-decoration: none; color: purple; text-align: center'>";
                    mostrar += "<h3 class='card-title' id='card-body.h3'>" + obj.nomeProduto + "</h3>";
                    mostrar += "</a>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<strike style='color: gray; font-size: 1.2rem; margin-bottom: 0;'> R$ " + obj.precoSemDesconto + "</strike>";
                    mostrar += "<p><span style='color: purple; font-size: 1.5rem; margin-top: 0;'> R$ " + obj.preco + "</span></p>";
                    mostrar += "</div>";
                    mostrar += "<div>";
                    mostrar += "<a href='#' class='btn btn-dark'>Adicionar ao Carrinho</a>";
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
                        <img class="img-erroProduto" src="produto-nao-encontrado.png" alt="Busca Vazia">
                        </div>
                    `;
                }

                // Sem registros no banco
                //mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
            }

            document.getElementById("highlightCarousel").style.display = "none";
            document.getElementById("dark-nav").style.display = "none";

            // Colocar no DIV "resultado" acima
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
