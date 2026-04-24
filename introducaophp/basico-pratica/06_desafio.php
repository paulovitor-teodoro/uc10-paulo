<?php
 $salario = 2100.00;
 $inss = 0.00;
 $salarioLiquido = 0.00;
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Cálculo de INSS</title>
    </head>
    <body>
        <?php
       if($salario <= 1621.00){
        $inss = $salario * 7.5 / 100;
         } elseif($salario > 1621.00 && $salario <= 3245.00){
            $inss = 1621.00 * 7.5 / 100 + ($salario - 1621.00) * 9 / 100;
         }
            elseif($salario > 3245.00 && $salario <= 7087.22){
                $inss = 1621.00 * 7.5 / 100 + (3245.00 - 1621.00) * 9 / 100 + ($salario - 3245.00) * 12 / 100;
            }
            else{
                $inss = 1621.00 * 7.5 / 100 + (3245.00 - 1621.00) * 9 / 100 + (7087.22 - 3245.00) * 12 / 100 + ($salario - 7087.22) * 14 / 100;
            }
            $salarioLiquido = $salario - $inss;
            echo "Salário Bruto: R$ " . number_format($salario, 2, ',', '.') . "<br>";
            echo "Valor do INSS: R$ " . number_format($inss, 2, ',', '.') . "<br>";
            echo "Salário Líquido: R$ " . number_format($salarioLiquido, 2, ',', '.') . "<br>";
         
        ?>
        
    </body>

</html>