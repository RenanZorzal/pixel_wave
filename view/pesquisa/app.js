$(document).ready(function () {

    //Quando clicar no botão Pesquisar

    $('#btnPesquisa').click(function (e) {

        var pesq = $('#campoPesquisa').val();     // Pegar campo texto da pesquisa
        console.log(pesq);

        if (pesq == "") {

            /*let dados = `
                <div class="erro-pesquisa">
                <img class="img-erro" src="busca-vazia.png" alt="Buca Vazia">
                </div>
            `;
            $('#section-resultado').html(dados).show();
            console.log("Pesquisa Vazia")
            return*/
        }

        //pesquisar(pesq);

    });

});