<?php

require_once("08conta.php");
require_once("08pessoafisica.php");
require_once("08pessoajuridica.php");
require_once("08itemExtrato.php");

session_start();


if (!isset($_SESSION["contas"])) {

    echo "Nenhuma conta cadastrada!";
    exit;
}


$indiceConta = $_POST["indiceConta"];
$valor = (float) $_POST["valor"];


$conta = $_SESSION["contas"][$indiceConta];


$conta->deposito($valor);


$_SESSION["contas"][$indiceConta] = $conta;

setcookie("ultima_conta", $indiceConta, time() + 3600);


echo "<h2>Depósito realizado com sucesso!</h2>";

echo "<br>";

$conta->imprimeExtrato();

?>

<br><br>

<a href="08menu.html">
    <button>Voltar ao Menu</button>
</a>