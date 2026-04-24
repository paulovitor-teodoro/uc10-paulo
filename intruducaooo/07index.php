<?php

    require("pessoa.php");
    require("pessoafisica.php");
    $pessoaFisica = new PessoaFisica("123.456.789-00", 30, 125.25);
    $pessoaFisica->imprime();
?>