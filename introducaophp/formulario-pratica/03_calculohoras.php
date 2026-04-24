<?php
    $entrada = new DateTime($_POST["entrada"]);
    $saida = new DateTime($_POST["saida"]);

    $diferenca = $entrada->diff($saida);

    echo "<h2>Dados Recebidos</h2>";
    echo "Horas Trabalhadas: " . $diferenca->h . " horas, " . $diferenca->i . " minutos<br>";
?>