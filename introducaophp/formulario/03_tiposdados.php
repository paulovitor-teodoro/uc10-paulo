<?php
if (isset($_POST["nometecnico"])) {

    $nometecnico = $_POST["nometecnico"];
    $nacionalidade = $_POST["nacionalidade"];
    $salario = $_POST["salario"];
    $tempocontrato = $_POST["tempocontrato"];
    $estilojogo = $_POST["estilojogo"] ?? [];
    $formacao = $_POST["formacao"];
    $experiencia = $_POST["experiencia"];
    $time = $_POST["time"] ?? '';

    echo "<h2>Dados Recebidos</h2>";
    echo "Nome do Técnico: $nometecnico <br>";
    echo "Nacionalidade: $nacionalidade <br>";
    echo "Salário: $salario <br>";
    echo "Tempo de Contrato: $tempocontrato anos<br><br>";

    echo "Estilo de Jogo:<br>";
    foreach ($estilojogo as $estilo) {
        echo "- $estilo <br>";
    }

    echo "<br>Formação: $formacao <br>";
    echo "Experiência: $experiencia anos<br>";
    echo "Time escolhido: $time <br>";

    echo '<br><a href="03_tiposdados.html">Voltar</a>';
}
else {
    echo "Acesso inválido.";
}
?>