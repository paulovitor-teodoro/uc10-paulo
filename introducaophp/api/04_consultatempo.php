<?php
$apiKey = '1c4d883e06e23694b8329a25f6af5cdf';
$latitude = '-22.2138900';
$longitude = '-49.9458300';

$url = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$apiKey}&lang=pt_br&units=metric";

$resposta = file_get_contents($url);

if($resposta !== false){
    $dados = json_decode($resposta, true);

    echo "<pre>";
    print_r($dados);
    echo "</pre>";
} else{
    echo "Erro ao consultar a API";
}


?>