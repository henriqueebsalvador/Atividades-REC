<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Desafio - Sistema de processamento de pedidos</title>
</head>
<body>
<h1>Desafio - Sistema de processamento de pedidos</h1>
<?php
require "funcoes.php";

$produtos = [
    ["nome" => "Teclado", "quantidade" => 2, "valorUnitario" => 150],
    ["nome" => "Mouse", "quantidade" => 3, "valorUnitario" => 80],
    ["nome" => "Monitor", "quantidade" => 1, "valorUnitario" => 700]
];
$relatorio = processarPedido($produtos);
?>
<table border="1" cellpadding="6">
    <tr><th>Produto</th><th>Quantidade</th><th>Valor unitário</th><th>Subtotal</th></tr>
    <?php foreach ($relatorio["produtos"] as $produto) { ?>
        <tr>
            <td><?= htmlspecialchars($produto["nome"]) ?></td>
            <td><?= $produto["quantidade"] ?></td>
            <td>R$ <?= number_format($produto["valorUnitario"], 2, ",", ".") ?></td>
            <td>R$ <?= number_format($produto["subtotal"], 2, ",", ".") ?></td>
        </tr>
    <?php } ?>
</table>
<?php
echo "<p>Produtos diferentes: " . $relatorio["diferentes"] . "</p>";
echo "<p>Total de itens: " . $relatorio["itens"] . "</p>";
if ($relatorio["maisCaro"] !== null) {
    echo "<p>Produto mais caro por unidade: " . htmlspecialchars($relatorio["maisCaro"]["nome"]) . "</p>";
    echo "<p>Produto com maior subtotal: " . htmlspecialchars($relatorio["maiorSubtotal"]["nome"]) . "</p>";
}
echo "<p>Total antes do desconto: R$ " . number_format($relatorio["total"], 2, ",", ".") . "</p>";
echo "<p>Desconto: R$ " . number_format($relatorio["desconto"], 2, ",", ".") . "</p>";
echo "<p>Frete: R$ " . number_format($relatorio["frete"], 2, ",", ".") . "</p>";
echo "<p>Valor final: R$ " . number_format($relatorio["final"], 2, ",", ".") . "</p>";
?>
<p><a href="../../index.php">Voltar para a lista de exercícios</a></p>
</body>
</html>
