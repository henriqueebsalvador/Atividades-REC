<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 10 - Sistema de notas</title>
</head>
<body>
<h1>Exercício 10 - Sistema de notas</h1>
<?php
require "funcoes.php";

$notas = [8, 6, 9, 7];
echo "<p>Notas: " . implode(", ", $notas) . "</p>";
foreach (calcularMedia($notas) as $nome => $valor) {
    echo "<p>$nome: $valor</p>";
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
