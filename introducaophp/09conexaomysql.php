<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'loja';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if($conexao->connect_error){
        die('Erro na conexão');
    }

    //echo 'Conexão realizada com sucesso';

    $sql = 'select id,estoque,nome,preco from produtos';
    $resultado = $conexao->query($sql);

    if($resultado->num_rows > 0){
        while($linha = $resultado->fetch_assoc()){
            //echo 'Código: '.$linha['id'].' Produto: '.$linha['nome'].' Preço: R$ '.$linha['preco'].' Estoque: '.$linha['estoque'];
            echo "<p>Código: $linha[id]  Produto: $linha[nome]  Preço: R$  $linha[preco]  Estoque: $linha[estoque]";
        }
    }
?>