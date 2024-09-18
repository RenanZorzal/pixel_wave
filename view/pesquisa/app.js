/*function pesquisar(){
    let pesq = document.getElementById(campoPesquisa).value;
    console.log(pesq);

    if (pesq == "") {

        /*let dados = `
                <div class="erro-pesquisa">
                <img class="img-erro" src="busca-vazia.png" alt="Buca Vazia">
                </div>
            `;
        $('#section-resultado').html(dados).show();
        console.log("Pesquisa Vazia")
        return
    }

}*/

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
}
