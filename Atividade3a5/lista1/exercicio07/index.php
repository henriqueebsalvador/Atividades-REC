<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 7 - Sistema de descontos</title>
</head>
<body>
<h1>Exercício 7 - Sistema de descontos</h1>
<?php
require "funcoes.php";

$resultado = calcularDesconto(750);
foreach ($resultado as $nome => $valor) {
    echo "<p>$nome: R$ " . number_format($valor, 2, ",", ".") . "</p>";
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
