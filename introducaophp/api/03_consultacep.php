<?php

// $endereco = null;
// if(isset($_POST['cep'])){
//     $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);
// }

//   $url = "https://viacep.com.br/ws/{$cep}/json/";

// $cURL = curl_init($url);

// curl_setopt($cURL,CURLOPT_RETURNTRANSFER, true);

// $respose = curl_exec($cURL);

// curl_close($cURL);

// $dados = file_get_contents($url);

// $endereco = json_decode($dados, true);


// CT02 (Segurança secundária): Se alguém tentar acessar o PHP diretamente sem preencher o formulário
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['cep'])) {
  echo "<h3>Erro: O campo CEP é obrigatório.</h3>";
  echo '<br><a href="03_consultacep.html">Voltar</a>';
  exit();
}

// CT04: Remove qualquer caractere não numérico que tenha burlado o HTML
$cepForm = preg_replace('/[^0-9]/', '', $_POST['cep']);

// CT03: Validação de Tamanho (Verifica se restaram exatamente 8 dígitos)
if (strlen($cepForm) !== 8) {
  echo "<h3>Erro: CEP inválido. O CEP deve conter exatamente 8 dígitos.</h3>";
  echo '<br><a href="03_consultacep.html">Voltar</a>';
  exit();
}

// URL montada de forma limpa
$url = "https://viacep.com.br/ws/{$cepForm}/json/";

// Execução ÚNICA com cURL (A redundância do file_get_contents foi eliminada)
$cURL = curl_init($url);
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false); // Evita erros de certificado no Apache local

$response = curl_exec($cURL);
curl_close($cURL); // Fecha a conexão imediatamente liberando memória do Apache

// Converte o JSON em um array do PHP
$endereco = json_decode($response, true);

// CT05 - Tratamento de Exceção: Se a ViaCEP retornar que o CEP não existe (Ex: 99999999)
if (!$endereco || isset($endereco['erro'])) {
  echo "<h3>Erro: CEP não encontrado. Verifique o número digitado e tente novamente.</h3>";
  echo '<br><a href="03_consultacep.html">Voltar</a>';
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Consulta</title>
</head>
<body>
    <div class="container">
        <h2>Resultado da Consulta</h2>
        <p><strong>CEP:</strong> <?php echo $endereco['cep']; ?></p>
        <p><strong>Logradouro:</strong> <?php echo !empty($endereco['logradouro']) ? $endereco['logradouro'] : 'Não informado'; ?></p>
        <p><strong>Bairro:</strong> <?php echo !empty($endereco['bairro']) ? $endereco['bairro'] : 'Não informado'; ?></p>
        <p><strong>Cidade:</strong> <?php echo $endereco['localidade']; ?></p>
        <p><strong>Estado (UF):</strong> <?php echo $endereco['uf']; ?></p>
        
        <br>
        <a href="03_consultacep.html"><button type="button">Nova Consulta</button></a>
    </div>
</body>
</html>
