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
            $('#section-resultado').html(dados).show();
            console.log("Pesquisa Vazia")
            return
        }

        pesquisar(pesq);

    });

});

function pesquisar(pesq){
    console.log(pesq)
    // Chamar o PHP do servidor com AJAX

    $.ajax({
        url: '../../control/pesqProduto.php',
        type: 'POST',
        data: { pesq: pesq },       // Envio do texto de pesquisa
        dataType: 'json',
        success: function (data) {
            // data == dados de retorno no formato JSON
            // O JSON foi criado com dois campos "erro" e "produtos", onde "produtos" é um array de dados

            // Montar o HTML/DIV com os dados de retorno
            var mostrar = '';

            if (data.erro == "") {
                // Se NÃO tiver erros

                if (data.produtos.length == 1) {
                    mostrar += "<h4>Foi encontrado 1 produto.</h4>";
                } else {
                    mostrar += "<h4>Foram encontrados " + data.produtos.length + " produtos.</h4>";
                }

                // Percorre todos os produtos do array "produtos", 
                //    onde i é o índice e obj são os dados do produto
                data.produtos.forEach(function (obj, i) {
                    mostrar += "<div class='col-sm-4'>";
                    mostrar += "<img src='data:image/jpeg;base64," + obj.imagem + "' height='100' width='100'>";
                    mostrar += "<h4 class='margin'>" + obj.nomeProduto + "</h4>";
                    mostrar += "<h5 class='margin'>R$ " + obj.preco + "</h5>";
                    mostrar += "<A href='../controlador/carrinho.php?id=" + obj.idProduto + "'><IMG src='../imagens/add_cart.png' height='30' width='30'></A>";
                    mostrar += "</div>";
                });


            } else {
                // Sem registros no banco
                mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
            }

            // Colocar no DIV "resultado" acima
            $('#resultado').html(mostrar).show();
        },
        error: function () {
            // ERRO ao pesquisar
            var mostrar = "";
            mostrar += "<h4 class='margin'>Erro ao chamar o pesquisar do servidor.</h4>";
            $('#resultado').html(mostrar).show();
        }
    });
}
