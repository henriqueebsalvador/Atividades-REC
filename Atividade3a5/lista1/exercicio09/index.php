<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 9 - Verificador matemático</title>
</head>
<body>
<h1>Exercício 9 - Verificador matemático</h1>
<?php
require "funcoes.php";

$numero = 28;
$resultado = analisarNumero($numero);
echo "<p>Número: $numero</p>";
echo "<p>Tipo: " . $resultado["Tipo"] . "</p>";
echo "<p>Primo: " . ($resultado["Primo"] ? "Sim" : "Não") . "</p>";
echo "<p>Perfeito: " . ($resultado["Perfeito"] ? "Sim" : "Não") . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
