<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 16 - Analisador de senhas</title>
</head>
<body>
<h1>Exercício 16 - Analisador de senhas</h1>
<?php
require "funcoes.php";

$senha = "Estudo123!";
echo "<p>Senha de exemplo: " . htmlspecialchars($senha) . "</p>";
foreach (analisarSenha($senha) as $nome => $valor) {
    echo "<p>$nome: $valor</p>";
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
