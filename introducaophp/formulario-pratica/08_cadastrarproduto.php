<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'loja';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$estoque = $_POST['estoque'];

if($nome == "" || $preco < 0 || $estoque < 0 ){
    die("Dados inválidos");
}

if ($conexao->connect_error) {
    die('Erro de Conexão' . $conexao->connect_error);
}

$sql = "INSERT INTO produtos (nome, preco, estoque) VALUES (?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sdi", $nome, $preco, $estoque);

$stmt->execute();

echo "<table border='1' cellpadding='8'>";
$sql = "SELECT * FROM produtos";
$resultado = $conexao->query($sql);

echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Preço</th>";
echo "<th>Estoque</th>";
echo "</tr>";
echo "</thead>";
while ($linha = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $linha['id'] . "</td>";
    echo "<td>" . $linha['nome'] . "</td>";
    echo "<td>" . "R$ " . number_format($linha['preco'], 2, ',', '.') . "</td>";
    echo "<td>" . $linha['estoque'] . "</td>";
    echo "</tr>";
}
echo "</table>";
