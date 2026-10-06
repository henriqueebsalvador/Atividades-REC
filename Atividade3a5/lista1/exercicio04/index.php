<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 4 - Gerador de senhas</title>
</head>
<body>
<h1>Exercício 4 - Gerador de senhas</h1>
<?php
require "funcoes.php";

$tamanho = 10;
echo "<p>Tamanho escolhido: $tamanho</p>";
echo "<p>Senha gerada: " . htmlspecialchars(gerarSenha($tamanho)) . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
