<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 6 - Conversor de temperatura</title>
</head>
<body>
<h1>Exercício 6 - Conversor de temperatura</h1>
<?php
require "funcoes.php";

$valor = 25;
echo "<p>Temperatura em Celsius: $valor °C</p>";
echo "<p>Fahrenheit: " . converterTemperatura($valor, "C", "F") . " °F</p>";
echo "<p>Kelvin: " . converterTemperatura($valor, "C", "K") . " K</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
