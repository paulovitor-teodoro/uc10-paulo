<?php
$salario = $_POST['salario'];
$inss = 0;

if ($salario <= 1320) {
    $inss = $salario * 0.075;
} elseif ($salario <= 2571.29) {
    $inss = (1320 * 0.075) + (($salario - 1320) * 0.09);
} elseif ($salario <= 3856.94) {
    $inss = (1320 * 0.075) +
            (1251.29 * 0.09) +
            (($salario - 2571.29) * 0.12);
} elseif ($salario <= 7507.49) {
    $inss = (1320 * 0.075) +
            (1251.29 * 0.09) +
            (1285.65 * 0.12) +
            (($salario - 3856.94) * 0.14);
} else {
    $inss = 876.97; 
}

$salarioLiquido = $salario - $inss;

echo "Salário bruto: R$ " . number_format($salario, 2, ',', '.') . "<br>";
echo "Valor do INSS: R$ " . number_format($inss, 2, ',', '.') . "<br>";
echo "Salário líquido: R$ " . number_format($salarioLiquido, 2, ',', '.');
?>