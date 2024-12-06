<?php
	
    require_once '../../model/vendaDAO.php';
    session_start();
    
    $idCliente = $_SESSION["idSessao"];
    $carrinho = $_SESSION["carrinho"];
    
	if ( count($carrinho) > 0) {
		// Inserir na TABELA PRINCIPAL DA VENDA
		$idVenda = inserirVenda($idCliente);
		
		
		// Percorrer o carrinho (sessão) e inserir na tabela ITENSVENDA
		$total = 0;
		foreach ( $carrinho as $idProduto => $produto) {
			$preco = $produto["preco"];
			$qtde = $produto["qtde"];

			$subTotal = $preco * $qtde;
			$total = $total + $subTotal;
			
			inserirItemVenda($idVenda, $idProduto, $qtde);
		}
		
		alterarTotal ( $idVenda, $total);

		atualizarEstoque($idVenda);
		
		// Apaga o carrinho da sessão
		unset( $_SESSION["carrinho"] );

		// Cria um novo carrinho vazio
		$_SESSION["carrinho"] = array();

		header("Location:../../view/home/vendaconfirm.php?msg=Venda realizada com sucesso.");
	} else {
		header("Location:../../view/carrinho/carrinho.php?msg=Não existem produtos.");
	}
?>

