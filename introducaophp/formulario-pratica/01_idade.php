<?php
    $nome = $_POST["nome"];
    $data= $_POST["data"];
    $curso = $_POST["curso"];

    $datanascimento = new DateTime($data);
    $hoje = new DateTime();

    $idade = $datanascimento->diff($hoje)->y;
    echo "<h2>Dados Recebidos</h2>";
    echo "Nome: " . $nome . "<br>";
    echo "Curso: " . $curso . "<br>";
    echo "Idade:" . $idade . " anos, " . $datanascimento->diff($hoje)->m . " meses e " . $datanascimento->diff($hoje)->d . " dias<br>";
?>