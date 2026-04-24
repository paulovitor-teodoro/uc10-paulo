
<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <title>Curso de PHP</title>
    </head>
    <body>
        
        <p>
            <!-- Pagina *Dinâmica* e Estática -->
            Olá, hoje é dia <?php
            echo date('d/m/Y');

            /*Aspas Simples, utilizando apenas para textos simples;*/
            $teste = 1;
            echo '<br>A caixa d\'água está vazia.\\$teste';
            echo '<br>A caixa d\'água está vazia.\\'.$teste; //Concatenação

            /*Aspas Duplas, são Processadas.Por isso permite mais recursos;*/
            $litros = '1000L';
            echo "<br>A caixa d'água é de $litros";
            
            ?>
        </p>
    </body>

</html>
