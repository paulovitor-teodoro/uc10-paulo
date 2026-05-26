<?php

$endereco = null;
if(isset($_POST['cep'])){
    $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);
}

  $url = "https://viacep.com.br/ws/{$cep}/json/";

$cURL = curl_init($url);

curl_setopt($cURL,CURLOPT_RETURNTRANSFER, true);

$respose = curl_exec($cURL);

curl_close($cURL);

$dados = file_get_contents($url);

$endereco = json_decode($dados, true);
?>