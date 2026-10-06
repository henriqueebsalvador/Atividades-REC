<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 11 - Formatador de relatórios</title>
</head>
<body>
<h1>Exercício 11 - Formatador de relatórios</h1>
<?php
require "funcoes.php";

$texto = "relatório de programação";
foreach (formatarTexto($texto) as $nome => $valor) {
    echo "<p>$nome: " . htmlspecialchars((string) $valor) . "</p>";
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
