<?php

require_once ("08conta.php");
require_once ("08pessoafisica.php");
require_once ("08pessoajuridica.php");
require_once ("08itemExtrato.php");

session_start();

if(!isset($_SESSION['contas'])){
    $_SESSION['contas'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tipo = $_POST['tipo_conta'];
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $saldo = $_POST['saldo_inicial'];

    if ($tipo === "poupanca") {

        $reajuste = !empty($_POST['reajuste']) ? (float)$_POST['reajuste'] : 0;

        $_SESSION['contas'][] = new Poupanca(
            $agencia,
            $conta,
            $saldo,
            $reajuste
        );

    } elseif ($tipo === "especial") {

        $limiteEspecial = !empty($_POST['limite']) ? (float)$_POST['limite'] : 0;

        $_SESSION['contas'][] = new Especial(
            $agencia,
            $conta,
            $saldo,
            $limiteEspecial
        );
        

    } else {

        echo "Tipo de conta inválido.";
        exit;

    }

    setcookie("ultimaConta", count($_SESSION["contas"]) -1, time() + 3600);

    echo 
        '<h2>Conta Cadastrada com Sucesso!</h2>

        <a href="08menu.html">
            <button>Voltar para o menu</button>
        </a>'
    ;
}
?>