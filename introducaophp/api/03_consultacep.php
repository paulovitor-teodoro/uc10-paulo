<?php

$mensagem = "";
$endereco = null;

function buscarCep($cep){
    $url = "https://viacep.com.br/ws/$cep/json/";
    $cURL = curl_init($url);
    curl_setopt_array($cURL, [
        CURLOPT_RETURNTRANSFER => true
    ]);
    $response = curl_exec($cURL);
   if (curl_errno($cURL)) {
        curl_close($cURL);
        return false; // Retorna null em caso de erro
    }
    curl_close($cURL);
    return json_decode($response, true);
}

// 2. Processamento do Formulário (Busca de CEP)
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $cep = trim($_POST['cep'] ?? '');
    // Limpa o CEP (mantém apenas números)
    $cep = preg_replace('/[^0-9]/', '', $cep);

    // Valida se o CEP tem o formato correto (8 dígitos)
    // A cep padrão do url pode ser substituida pela variável $cep, para que a consulta seja feita com o cep digitado pelo usuário.

    if(empty($cep)){
        $mensagem = "Digite um CEP";
    }
    elseif(strlen($cep) !== 8 || !ctype_digit($cep)){
        $mensagem = "CEP inválido. O CEP deve conter apenas 8 dígitos";
    }
    else{
        $endereco = buscarCep($cep);

        if($endereco === false){
            $mensagem = "Erro ao consultar o CEP";
        }
        elseif(isset($endereco['erro'])){
            $mensagem = "CEP não encontrado";
        }
    }
}

echo "CEP: $cep <br>";
echo "Logradouro: " . ($endereco['logradouro'] ?? 'N/A') . "<br>";
echo "Bairro: " . ($endereco['bairro'] ?? 'N/A') ."<br>";
echo "Cidade: " . ($endereco['localidade'] ?? 'N/A') . "<br>";
echo "Estado: " . ($endereco['uf'] ?? 'N/A') . "<br>";

?>
