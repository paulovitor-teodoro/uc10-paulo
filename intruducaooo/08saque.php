<?php
    require_once("08conta.php");
    require_once("08pessoafisica.php");
    require_once("08pessoajuridica.php");
    require_once("08itemExtrato.php");

    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $indiceConta = $_POST['indiceConta'];
        $valor = $_POST['valor'];

        $conta = $_SESSION['contas'][$indiceConta];

        $conta->saque($valor);

        setcookie("ultimaConta", $indiceConta, time() + 3600);

        echo "<h2>Saque Realizado com suceso!<h2>
        
            <a href= '08menu.html'>
                <button>Voltar ao Menu</button>
            </a>
        ";
    }
?>