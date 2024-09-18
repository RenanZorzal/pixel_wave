function pesquisar(){
    let pesq = document.getElementById(campoPesquisa).value;
    console.log(pesq);

    if (pesq == "") {

        /*let dados = `
                <div class="erro-pesquisa">
                <img class="img-erro" src="busca-vazia.png" alt="Buca Vazia">
                </div>
            `;
        $('#section-resultado').html(dados).show();*/
        console.log("Pesquisa Vazia")
        return
    }

}