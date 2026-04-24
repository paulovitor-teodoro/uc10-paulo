<?php
$cpf = $_POST['cpf'];

$cpf = preg_replace('/\D/', '', $cpf);

if (strlen($cpf) != 11) {
    echo "CPF inválido: deve conter 11 dígitos.";
    exit;
}

if (preg_match('/(\d)\1{10}/', $cpf)) {
    echo "CPF inválido: todos os dígitos são iguais.";
    exit;
}

for ($t = 9; $t < 11; $t++) {
    $soma = 0;
    for ($i = 0; $i < $t; $i++) {
        $soma += $cpf[$i] * (($t + 1) - $i);
    }
    $digito = ((10 * $soma) % 11) % 10;
    if ($cpf[$t] != $digito) {
        echo "CPF inválido: digito verificador não confere.";
        exit;
    }
}
echo "CPF Válido.";
