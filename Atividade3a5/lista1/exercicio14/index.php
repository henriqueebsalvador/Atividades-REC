<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 14 - Estatísticas numéricas</title>
</head>
<body>
<h1>Exercício 14 - Estatísticas numéricas</h1>
<?php
require "funcoes.php";

$numeros = [8, 3, 10, 5, 2, 6];
echo "<p>Números: " . implode(", ", $numeros) . "</p>";
foreach (estatisticasNumericas($numeros) as $nome => $valor) {
    echo "<p>$nome: $valor</p>";
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
