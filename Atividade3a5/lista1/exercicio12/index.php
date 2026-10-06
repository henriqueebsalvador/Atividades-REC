<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercício 12 - Catálogo de produtos</title>
</head>
<body>
<h1>Exercício 12 - Catálogo de produtos</h1>
<?php
require "funcoes.php";

$produtos = [
    ["nome" => "Arroz", "preco" => 25],
    ["nome" => "Feijão", "preco" => 8],
    ["nome" => "Leite", "preco" => 6]
];
$pesquisa = $_GET["produto"] ?? "";
?>
<form method="get">
    <label>Nome do produto: <input type="text" name="produto" required></label>
    <button type="submit">Pesquisar</button>
</form>
<h2>Produtos cadastrados</h2>
<ul>
<?php
foreach ($produtos as $produto) {
    echo "<li>" . htmlspecialchars($produto["nome"]) . ": R$ " . number_format($produto["preco"], 2, ",", ".") . "</li>";
}
echo "</ul>";
$resultado = analisarProdutos($produtos, $pesquisa);
echo "<p>Mais caro: " . htmlspecialchars($resultado["maisCaro"]["nome"]) . "</p>";
echo "<p>Mais barato: " . htmlspecialchars($resultado["maisBarato"]["nome"]) . "</p>";
echo "<p>Média dos preços: R$ " . number_format($resultado["media"], 2, ",", ".") . "</p>";
if ($pesquisa != "") {
    echo "<h2>Resultado da pesquisa</h2>";
    if (count($resultado["pesquisa"]) == 0) {
        echo "<p>Produto não encontrado.</p>";
    }
    foreach ($resultado["pesquisa"] as $produto) {
        echo "<p>" . htmlspecialchars($produto["nome"]) . ": R$ " . number_format($produto["preco"], 2, ",", ".") . "</p>";
    }
}
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
