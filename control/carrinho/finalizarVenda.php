<?php
	
    require_once '../../model/vendaDAO.php';
    session_start();
    
    $idCliente = $_SESSION["idSessao"];
    $carrinho = $_SESSION["carrinho"];
    
	if ( count($carrinho) > 0) {
		// Inserir na TABELA PRINCIPAL DA VENDA
		$endereco = getEndereco($idCliente);
		$idVenda = inserirVenda($idCliente, $endereco);
		
		
		// Percorrer o carrinho (sessão) e inserir na tabela ITENSVENDA
		$total = 0;
		foreach ($carrinho as $idProduto => $produto) {
			$preco = $produto["preco"];
			$qtde = $produto["qtde"];
			$endereco = getEndereco($idCliente);
			$subTotal = $preco * $qtde;
			$total = $total + $subTotal;
			
			inserirItemVenda($idVenda, $idProduto, $qtde, 2);
			
			// Atualizar o estoque do produto
			try {
				atualizarEstoque2($idProduto, $qtde);
				header("Location:../../view/finalizarcompra/vendaconfirm.php?msg=Venda realizada com sucesso.");
			} catch (Exception $e) {
				// Lidar com erro de estoque (ex.: log ou mensagem ao usuário)
				echo "Erro ao atualizar estoque: " . $e->getMessage();
			}
		}
		
		
		
		// Apaga o carrinho da sessão
		unset( $_SESSION["carrinho"] );

		// Cria um novo carrinho vazio
		$_SESSION["carrinho"] = array();

		
	} else {
		header("Location:../../view/carrinho/carrinho.php?msg=Não existem produtos.");
	}
?>

