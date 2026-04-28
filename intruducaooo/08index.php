<?php
require_once '08conta.php';
require_once '08pessoafisica.php';
require_once '08pessoajuridica.php';

    
$poupanca = new Poupanca("0002-7", "85588-88", 755.54, 0.0055);
$poupanca->deposito(1500.00);

$especial = new Especial("0055-2", "75588-42", 2300.25, 5000.00);
$especial->deposito(1500.00);

$pessoaFisica = new PessoaFisica("João Silva", "123.456.789-01", $poupanca);
$pessoaJuridica = new PessoaJuridica("Atacado das Embalagens", "12.345.678/0001-90", $especial);

$pessoaFisica->imprime();
$pessoaJuridica->imprime();


