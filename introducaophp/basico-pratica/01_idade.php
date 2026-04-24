<?php
$nome = 'Paulo';
$dataNascimento = new DateTime('2005-04-15');
$curso = 'Desenvolvimento de Sistemas';

$hoje = new DateTime();

$idade = $dataNascimento->diff($hoje)->y;



?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Idade e Cálculo</title>
    </head>
    <body>
        <?php
        echo "<br>Nome: $nome";
        echo "<br>Idade: $idade";
        echo "<br>Curso: $curso";
        
        ?>
    </body>

</html>