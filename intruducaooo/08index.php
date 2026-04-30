<?php
require_once ('08conta.php');
require_once ('08pessoafisica.php');
require_once ('08pessoajuridica.php');
require_once ('08itemExtrato.php');


$tipo = $_POST['tipo_conta'];
$agencia = $_POST['agencia'];
$conta = $_POST['conta'];
$saldo = (float)$_POST['saldo_inicial'];

$reajuste = !empty($_POST['reajuste']) ? (float)$_POST['reajuste'] : 0;
$limite = !empty($_POST['limite']) ? (float)$_POST['limite'] : 0;



if ($tipo === "poupanca") {
    $contaObj = new Poupanca($agencia, $conta, $saldo, $reajuste);
} else {
    $contaObj = new Especial($agencia, $conta, $saldo, $limite);
}

$contaobj = new Especial($agencia, $conta, $saldo, $limite);

echo "<h2>DADOS DA CONTA</h2>";
$contaobj->imprimeExtrato();


