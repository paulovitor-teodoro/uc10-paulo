<?php
$dados = [
    'cep' => $_POST['cep'],
    'rua' => $_POST['rua'],
    'bairro' => $_POST['bairro'],
    'cidade' => $_POST['cidade'],
    'uf' => strtoupper($_POST['uf'])
];

foreach ($dados as $chave => $valor) {
    echo strtoupper($chave) . ": $valor <br>";
}
?>