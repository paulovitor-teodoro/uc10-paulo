<?php
    $produto = 
    [
        'nome' => 'Controle Playstation 2',
        'preço' => 95.00,
        'estoque' => 15
    ];
?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <title>Curso de PHP</title>
    </head>
    <body>
        
        <?php
         $precoFormatado = number_format($produto['preço'], 2, ',', '.');
         echo "Produto: $produto[nome] Preço: R$ $precoFormatado Estoque: $produto[estoque]";
        ?>
        
    </body>

</html>
