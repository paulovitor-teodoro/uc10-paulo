<?php
 $nota1 = 7.3;
 $nota2 = 6;
 $nota3 = 9;

 $media = ($nota1 + $nota2 + $nota3) / 3;

 echo "Média: " . $media . "<br>";
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Média e Situação</title>
    </head>
    <body>
        <?php
        if($media >= 7) 
            {
                echo "Aprovado";
            }
        elseif($media >= 5 && $media < 7)
            {
                echo " Em recuperação";
            }
        else
            {
                echo "Reprovado";
            }
        ?>
    </body>

</html>