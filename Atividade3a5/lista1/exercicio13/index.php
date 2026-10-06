<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 13 - Cifra de César</title>
</head>
<body>
<h1>Exercício 13 - Cifra de César</h1>
<?php
require "funcoes.php";

$texto = "Olá, mundo! XYZ";
$criptografado = criptografarMensagem($texto);
echo "<p>Original: " . htmlspecialchars($texto) . "</p>";
echo "<p>Criptografado: " . htmlspecialchars($criptografado) . "</p>";
echo "<p>Descriptografado: " . htmlspecialchars(descriptografarMensagem($criptografado)) . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
