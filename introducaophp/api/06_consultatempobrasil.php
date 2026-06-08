<?php

// API IBGE - Lista de Municípios
$url = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios?orderBy=nome";

$resposta = file_get_contents($url);

if ($resposta === false) {
    die("Erro ao consultar a API do IBGE.");
}

$municipios = json_decode($resposta, true);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Tempo Brasil</title>
</head>
<body>

    <h1>Consulta de Tempo Brasil</h1>

    <form method="post">
        <label for="cidade">Selecione um município:</label>

        <select name="cidade" id="cidade">
            <?php foreach ($municipios as $municipio): ?>
                <option value="<?= $municipio['nome'] ?>|<?= $municipio['microrregiao']['mesorregiao']['UF']['sigla'] ?>"
                <?= (isset($_POST['cidade']) && $_POST['cidade'] == $municipio['nome'].'|'.$municipio['microrregiao']['mesorregiao']['UF']['sigla']) ? 'selected' : '' ?>
                >
    <?= $municipio['nome'] ?> - <?= $municipio['microrregiao']['mesorregiao']['UF']['sigla'] ?>
</option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Consultar</button>
    </form>

    <hr>

    <?php

    if (isset($_POST['cidade'])) {
       
        
        list($cidade, $uf) = explode('|', $_POST['cidade']);

        echo "<h2>Cidade selecionada: {$cidade}</h2>";

        // API Nominatim - Latitude e Longitude
        $cidadeCodificada = urlencode($cidade);

        $urlNominatim = "https://nominatim.openstreetmap.org/search?q={$cidadeCodificada},{$uf},Brasil&format=json&limit=1";

        $contexto = stream_context_create([
            "http" => [
                "header" => "User-Agent: ConsultaTempoBrasil/1.0\r\n"
            ]
        ]);

        $respostaNominatim = file_get_contents($urlNominatim, false, $contexto);

        if ($respostaNominatim !== false) {

            $dadosLocalizacao = json_decode($respostaNominatim, true);

            if (!empty($dadosLocalizacao)) {

                $latitude = $dadosLocalizacao[0]['lat'];
                $longitude = $dadosLocalizacao[0]['lon'];

                // API OpenWeatherMap
                $apiKey = "1c4d883e06e23694b8329a25f6af5cdf";

                $urlClima = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$apiKey}&units=metric&lang=pt_br";

                $respostaClima = file_get_contents($urlClima);

                if ($respostaClima !== false) {

                    $dadosClima = json_decode($respostaClima, true);

                    echo "<h2>Previsão do Tempo</h2>";

                    echo "<strong>Município:</strong> " . $cidade . " - " . $uf . "<br>";
                    echo "<strong>UF:</strong> " . $uf . "<br>";
                    echo "<strong>Latitude:</strong> " . $latitude . "<br>";
                    echo "<strong>Longitude:</strong> " . $longitude . "<br>";

                    echo "<strong>Temperatura Atual:</strong> " . ($dadosClima['main']['temp'] ?? 'N/A') . " °C<br>";
                    echo "<strong>Sensação Térmica:</strong> " . ($dadosClima['main']['feels_like'] ?? 'N/A') . " °C<br>";
                    echo "<strong>Umidade do Ar:</strong> " . ($dadosClima['main']['humidity'] ?? 'N/A') . "%<br>";
                    echo "<strong>Condição Climática:</strong> " . ($dadosClima['weather'][0]['description'] ?? 'N/A') . "<br>";
                    echo "<strong>Velocidade do Vento:</strong> ". ($dadosClima['wind']['speed'] ?? 'N/A'). " m/s<br>";

                } else {
                    echo "Erro ao consultar a API OpenWeatherMap.";
                }

            } else {
                echo "Cidade não encontrada no Nominatim.";
            }

        } else {
            echo "Erro ao consultar a API Nominatim.";
        }
    }

    ?>

</body>
</html>