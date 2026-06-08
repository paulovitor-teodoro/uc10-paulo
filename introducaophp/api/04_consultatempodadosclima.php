<?php
$apiKey = '1c4d883e06e23694b8329a25f6af5cdf';
$latitude = '-22.2138900';
$longitude = '-49.9458300';

$url = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$apiKey}&lang=pt_br&units=metric";

$resposta = file_get_contents($url);

if($resposta !== false){
    $dados = json_decode($resposta, true);

    echo "<h1>Consulta Meteorológica</h1>";

    echo "Cidade: " . ($dados['name'] ?? 'N/A') . "<br>";
    echo "Temperatura: " . ($dados['main']['temp'] ?? 'N/A') . " °C<br>";
    echo "Sensação Térmica: " . ($dados['main']['feels_like'] ?? 'N/A') . " °C<br>";
    echo "Umidade: " . ($dados['main']['humidity'] ?? 'N/A') . " %<br>";
    echo "Condição: " . ($dados['weather'][0]['description'] ?? 'N/A') . "<br>";
} else{
    echo "Erro ao consultar a API";
    exit;
}

?>