<?php
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $n3 = $_POST["n3"];

    $total = $n1 + $n2 + $n3;
    $media = $total / 3;

    if($media >= 7)
    {
       $situacao = "Aprovado";
    }
    else if($media >= 5 && $media < 7)
    {
        $situacao = "Recuperação";
    }
    else
    {
        $situacao = "Reprovado";
    }

    echo "<h2>Dados Recebidos</h2>";
    echo "Total: " . $total . "<br>";
    echo "Média: " . number_format($media, 2) . "<br>";
    echo "Situação: " . $situacao. "<br>";
?>