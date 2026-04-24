<?php
 $endereco = [
    'CEP' => '17502-000',
    'Rua' => 'Rua 24 de Dezembro',
    'Bairro' => 'Centro',
    'Cidade' => 'Marília',
    'UF' => 'SP'
 ];
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Array Associativo</title>
    </head>
    <body>
        <?php
        foreach($endereco as $chave => $valor){
            echo "$chave: $valor <br>";
        }
        ?>
        
    </body>

</html>