<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 5 - Estatísticas de texto</title>
</head>
<body>
<h1>Exercício 5 - Estatísticas de texto</h1>
<?php
require "funcoes.php";

$texto = "Olá, mundo!";
echo "<p>Texto: " . htmlspecialchars($texto) . "</p>";
$resultado = analisarTexto($texto);
foreach ($resultado as $nome => $valor) {
    echo "<p>$nome: $valor</p>";
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
