<?php
//Informar o End-Point
$url = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios?orderBy=nome";

//Inicializa uma sessão curl
//cURL: inicializa uma biblioteca do PHP usada para fazer requisições HTTP
$cURL = curl_init($url);

//configura as opções da requisição cURL
//-CURLOPT_RETURNTRANSFER: define que o resultado da requisição seja armazenado em uma variável
//- true: ativa o comportamento
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

//executa a requisição
$response = curl_exec($cURL);

//fecha a conexão url e libera a memória do servidor
//Está obsoleto porque é desnecessária
curl_close($cURL);

//Transforma as informações em objetos que o php consegue ler
//Transforma o JSON em um array nomeada
$cidades = json_decode($response);

foreach($cidades as $cid){
    
    echo "<h3>$cid->nome</h3>";

    echo "ID Cidade: " . $cid->id . "<br>"; 

    echo "Microrregião: ";
    if($cid->microrregiao != null)
    echo $cid->microrregiao->nome . "<br>";

    echo "Mesorregião: ";
    echo $cid->microrregiao->mesorregiao->nome . "<br>";

    echo "UF: ";
    echo $cid->microrregiao->mesorregiao->UF->sigla . "<br>";

    echo "Estado: ";
    echo $cid->microrregiao->mesorregiao->UF->nome . "<br>";

    echo "Região: ";
    echo $cid->microrregiao->mesorregiao->UF->regiao->nome . "<br>";

    echo "<hr>";
}



















?>