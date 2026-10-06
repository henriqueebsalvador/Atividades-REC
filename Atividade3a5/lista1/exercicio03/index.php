<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 3 - Cadastro seguro</title>
</head>
<body>
<h1>Exercício 3 - Cadastro seguro</h1>
<?php
require "funcoes.php";

$cpf = "123.456.789-00";
echo "<p>CPF mascarado: " . mascararCpf($cpf) . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
