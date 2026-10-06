<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 8 - Organizador de lista</title>
</head>
<body>
<h1>Exercício 8 - Organizador de lista</h1>
<?php
require "funcoes.php";

$texto = "Pedro, Ana, Carlos, Beatriz";
echo "<p>Lista original: " . htmlspecialchars($texto) . "</p>";
echo "<ol>";
foreach (ordenarNomes($texto) as $nome) {
    echo "<li>" . htmlspecialchars($nome) . "</li>";
}
echo "</ol>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
