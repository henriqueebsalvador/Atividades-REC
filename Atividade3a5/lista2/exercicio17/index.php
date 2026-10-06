<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 17 - Processador de texto</title>
</head>
<body>
<h1>Exercício 17 - Processador de texto</h1>
<?php
require "funcoes.php";

$texto = "PHP é legal.  Estudar PHP é muito legal!";
$resultado = processarTexto($texto);
echo "<p>Texto original: " . htmlspecialchars($texto) . "</p>";
echo "<p>Caracteres: " . $resultado["caracteres"] . "</p>";
echo "<p>Palavras: " . $resultado["palavras"] . "</p>";
echo "<p>Frases: " . $resultado["frases"] . "</p>";
echo "<p>Palavra mais longa: " . htmlspecialchars($resultado["longa"]) . "</p>";
echo "<p>Palavra mais curta: " . htmlspecialchars($resultado["curta"]) . "</p>";
echo "<p>Repetições após a primeira ocorrência: " . $resultado["repetidas"] . "</p>";
echo "<h2>Até cinco palavras mais frequentes</h2><ul>";
foreach ($resultado["frequentes"] as $palavra => $quantidade) {
    echo "<li>" . htmlspecialchars($palavra) . ": $quantidade</li>";
}
echo "</ul>";
echo "<p>Sem espaços duplicados: " . htmlspecialchars($resultado["semEspacosExtras"]) . "</p>";
echo "<p>Formatado: " . htmlspecialchars($resultado["formatado"]) . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
