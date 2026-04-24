<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'escola_paulo';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if($conexao->connect_error){
    die('Erro na conexão');
}

$sql = 'select id,nome,idade,uf,cidade from alunos';
$resultado = $conexao->query($sql);

echo"<h2> Lista de Alunos</h2>";
if($resultado->num_rows > 0){
    while($linha =$resultado->fetch_assoc()){
        echo "<ul>";
        echo "<li>Código: {$linha['id']} Nome: {$linha['nome']} Idade: {$linha['idade']} UF: {$linha['uf']} Cidade: {$linha['cidade']}</li>";
        echo "</ul>";
    }
}
?>