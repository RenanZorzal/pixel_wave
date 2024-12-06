<?php

    require_once "a.conexaoBD.php";    
    static $conexao;

    function inserirVenda($idCliente,$endereco ) {
        $conexao = conectarBD();  

        $sql = "INSERT INTO VendaCompra (dataHora, nota_fiscal, valorTotal, Comprador_idComprador, StatusCompra_idStatusCompra, endereco) "
                . "VALUES ( NOW(), null, 0.0, $idCliente, 2, '$endereco') ";
        
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
        $id = mysqli_insert_id($conexao);
        return $id;
    }


    function inserirItemVenda($idVenda, $idProduto, $qtde){
        $conexao = conectarBD();  

        $sql = "INSERT INTO ItensVendaCompra (VendaCompra_idVendaCompra, Produto_idProduto, qtdeItens) "
                . "VALUES ($idVenda, $idProduto, $qtde)";
        
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    }

    
    function alterarTotal ($idVenda, $total) {
        $conexao = conectarBD();  
        
        $sql = "UPDATE VendaCompra SET valorTotal = $total WHERE idVendaCompra = $idVenda";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));        
    }

    function atualizarEstoque($idVenda) {
        $conexao = conectarBD();
    
        // Consulta para buscar os itens da venda
        $sql = "SELECT iv.Produto_idProduto, iv.qtdeItens
                FROM ItensVendaCompra AS iv
                WHERE iv.VendaCompra_idVendaCompra = $idVenda";
    
        $resultado = mysqli_query($conexao, $sql);
    
        if (!$resultado) {
            die("Erro ao buscar itens da venda: " . mysqli_error($conexao));
        }
    
        // Atualiza o estoque para cada produto
        while ($item = mysqli_fetch_assoc($resultado)) {
            $idProduto = $item['Produto_idProduto'];
            $quantidadeComprada = $item['qtdeItens'];
    
            $sqlAtualizar = "UPDATE Produto 
                             SET qtdEstoque = qtdEstoque - $quantidadeComprada 
                             WHERE idProduto = $idProduto";
    
            if (!mysqli_query($conexao, $sqlAtualizar)) {
                die("Erro ao atualizar estoque do produto $idProduto: " . mysqli_error($conexao));
            }
        }
    
        mysqli_close($conexao);
        return true;
    }

    function mostrarStatus($idVenda, $idProduto) {
        $conexao = conectarBD();  
        $sql = "SELECT * FROM itensvendacompra WHERE VendaCompra_idVendaCompra = $idVenda AND Produto_idProduto = $idProduto";
    
        $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        
        // Verifica se a consulta retornou alguma linha
        if ($res && $linha = mysqli_fetch_assoc($res)) {
            return $linha['Status']; // Retorna o valor do status
        }
        
        return 0; // Retorna um valor padrão caso não haja resultados
    }
    function alterarEndereço ($idComprador, $endereco) {
        $conexao = conectarBD();  
        
        $sql = "UPDATE Comprador SET enderecoComprador = '$endereco' WHERE idComprador = $idComprador";
        mysqli_query($conexao, $sql) or die (mysqli_error($conexao));        
    }

    function getEndereco($idComprador) {
        $conexao = conectarBD();  
        $sql = "SELECT * FROM Comprador WHERE idComprador = $idComprador";
    
        $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        
        // Verifica se a consulta retornou alguma linha
        if ($res && $linha = mysqli_fetch_assoc($res)) {
            return $linha['enderecoComprador']; // Retorna o valor do status
        }
        
    }
    function getEstoque($idProduto) {
        $conexao = conectarBD();  
        $sql = "SELECT * FROM Produto WHERE idProduto = $idProduto";
    
        $res = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        
        // Verifica se a consulta retornou alguma linha
        if ($res && $linha = mysqli_fetch_assoc($res)) {
            return $linha['qtdEstoque']; // Retorna o valor do status
        }
        
    }
    function atualizarEstoque2($idProduto, $quantidadeComprada) {
        $conexao = conectarBD();
        
        // Verificar o estoque atual do produto
        $sqlConsulta = "SELECT qtdEstoque FROM Produto WHERE idProduto = ?";
        $stmtConsulta = $conexao->prepare($sqlConsulta);
        $stmtConsulta->bind_param("i", $idProduto);
        $stmtConsulta->execute();
        $resultado = $stmtConsulta->get_result();
        
        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $estoqueAtual = $linha['qtdEstoque'];
            
            // Verificar se há estoque suficiente
            if ($estoqueAtual >= $quantidadeComprada) {
                // Atualizar o estoque
                $novoEstoque = $estoqueAtual - $quantidadeComprada;
                $sqlAtualizar = "UPDATE Produto SET qtdEstoque = ? WHERE idProduto = ?";
                $stmtAtualizar = $conexao->prepare($sqlAtualizar);
                $stmtAtualizar->bind_param("ii", $novoEstoque, $idProduto);
                $stmtAtualizar->execute();
    
                if ($stmtAtualizar->affected_rows > 0) {
                    return true; // Estoque atualizado com sucesso
                } else {
                    return false; // Falha na atualização do estoque
                }
            } else {
                // Estoque insuficiente
                throw new Exception("Estoque insuficiente para o produto ID: $idProduto");
            }
        } else {
            throw new Exception("Produto não encontrado: ID $idProduto");
        }
    }

?>

