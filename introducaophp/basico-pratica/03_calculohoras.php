<?php
 $horaEntrada = new DateTime('07:00');
 $horaSaida = new DateTime('18:00');

 $interval = $horaSaida->diff($horaEntrada);
 
 $horasTrabalhadas = $interval->h;
 ?>
<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <title>Cálculo de Horas</title>
    </head>
    <body>
        <?php
        echo "Horas trabalhadas: " . $horasTrabalhadas;
        ?>
    </body>

</html>