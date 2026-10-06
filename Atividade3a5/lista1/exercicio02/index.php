<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 2 - Espelho mágico</title>
</head>
<body>
<h1>Exercício 2 - Espelho mágico</h1>
<?php
require "funcoes.php";

$texto = "Olá mundo";
echo "<p>Texto original: " . htmlspecialchars($texto) . "</p>";
echo "<p>Texto invertido: " . htmlspecialchars(inverterTexto($texto)) . "</p>";
echo "<p>Quantidade de caracteres: " . mb_strlen($texto, "UTF-8") . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
