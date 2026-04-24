<?php
$produto = 'Camiseta';
$valorUnitario = '50';
$quantidade = 6;
 
$total = $valorUnitario * $quantidade;
 
if ($total >= 300)
{$desconto = $total * 0.9;}
 
elseif ($total >= 100)
{$desconto = $total * 0.05;}
 
else
{$desconto = 0;}    
$totalComDesconto = $total - $desconto;
?>
 
 
<h1>Produto: <?php echo $produto ?></h1>
<h1>ValorUnitario: <?php echo $valorUnitario ?></h1>
<h1>Quantidade: <?php echo $quantidade ?></h1>
<h1>Total: <?php echo $total ?></h1>
<h1>Desconto: <?php echo $desconto ?></h1>
<h1>Total com Desconto: <?php echo $totalComDesconto ?></h1>