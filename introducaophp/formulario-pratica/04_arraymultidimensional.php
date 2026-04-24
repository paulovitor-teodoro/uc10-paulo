<?php
 if (isset($_POST['uf']) && isset($_POST['estado'])) {
    $ufs = $_POST["uf"];
    $estados = $_POST["estado"];

    $array = [];
    for ($i = 0; $i < count($ufs); $i++) {

        if (!empty($ufs[$i]) && !empty($estados[$i])) {

            $array[] = [
                "uf" => strtoupper($ufs[$i]),
                "estado" => strtoupper($estados[$i])
            ];
        }
    }

    echo "<h2>Estados cadastrados:</h2>";

    foreach ($array as $item) {
        echo $item['uf'] . " - " . $item['estado'] . "<br>";
    }

} else {
    echo "Acesse pelo formulário!";
}
?>