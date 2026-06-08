<?php

$cidade = "Marilia";
$estado = "SP";

$url = "https://nominatim.openstreetmap.org/search?q={$cidade},{$estado},Brasil&format=json&limit=1";

// O Nominatim exige um User-Agent
$opcoes = [
    "http" => [
        "header" => "User-Agent: SistemaConsultaMunicipio/1.0\r\n"
    ]
];

$contexto = stream_context_create($opcoes);

// Faz a requisição
$resposta = file_get_contents($url, false, $contexto);
// $resposta = file_get_contents($url);

// if ($resposta === false) {
//     die("Erro ao consultar a API.");
// }

// Converte o JSON para array PHP
$dados = json_decode($resposta, true);

// Verifica se encontrou a cidade
if (!empty($dados)) {

    $latitude = $dados[0]['lat'];
    $longitude = $dados[0]['lon'];

    echo "<h2>Localização de {$cidade} - {$estado}</h2>";

    echo "<strong>Latitude:</strong> {$latitude}<br>";
    echo "<strong>Longitude:</strong> {$longitude}<br>";

} else {

    echo "Município não encontrado.";

}

?>