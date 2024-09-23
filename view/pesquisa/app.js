$(document).ready(function () {

    //Quando clicar no botão Pesquisar

    $('#btnPesqEmp').click(function (e) {

        var pesq = $('#campoPesqEmp').val();     // Pegar campo texto da pesquisa
        
        if(pesq == ""){
            
            let dados = `
                <div class="erro-pesquisa">
                <img class="img-erro" src="img/busca-vazia.png" alt="Busca Vazia">
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

    $.ajax({
        url: '../../control/cadastro/empresa/pesqEmpresa.php',
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

                data.empresas.forEach(function (obj, i) {
                    mostrar += "<div class='item-resultado'>";
                    mostrar += "<div>";
                    mostrar += "<img class='img-resultado' src='data:image/jpeg;base64, "+ obj.imagem +"' alt = 'Logo da Empresa'>";
                    mostrar += "</div>";
                    mostrar += "<div class='text-resultado' ";
                    mostrar += "<h2 class='titulo'>";
                    mostrar += "<b>";
                    mostrar += "<a href='perfil-empresa.php?id=" + obj.idVendedor + "'>" + obj.nomeEmpresa +"</a>";
                    mostrar += "</b>";
                    mostrar += "</h2>";
                    mostrar += "<p class='descricao - meta'>" + obj.descricao +"</p>";
                    mostrar += "</div>";
                    mostrar += "</div>";
                    //mostrar += "<A href='../controlador/carrinho.php?id=" + obj.idProduto + "'><IMG src='../imagens/add_cart.png' height='30' width='30'></A>";
                });


            } else {
                if (data.erro == 'Vendedor não encontrado.') {
                    console.log("entrou no erro")
                    mostrar += `
                        <div class="erro-pesquisa">
                        <img class="img-erroEmpresa" src="img/empresa-nao-encontrada.png" alt="Busca Vazia">
                        </div>
                    `;
                }

                // Sem registros no banco
                //mostrar += "<h4 class='margin'>" + data.erro + "</h4>";
            }

            // Colocar no DIV "resultado" acima
            $('#section-resultado').html(mostrar).show();
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
